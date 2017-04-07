<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Product;
use App\Item;

class APIController extends Controller
{
	public function login(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			echo json_encode(array(
				'status' => true,
				'user' => Auth::user()
			));
		} else {
			echo json_encode(array(
				'status' => false,
				'user' => null
			));
		}
	}

	public function item_save(Request $request) {
		$product_id = $request->input('product_id');
		$user_id = $request->input('user_id');
		$product = Product::find($product_id);
		$item = new Item;
		$item->user_id = $user_id;
		$item->title = $product->title;
		$item->bullet_points = $product->bullet_points;
		$item->link = $product->link;
		$item->img_url = $product->img_url;
		$item->brand_url = $product->brand_url;
		$item->price = $product->price;
		$item->top_bsr = $product->top_bsr;
		$item->bottom_bsr = $product->bottom_bsr;
		$item->keywords = $product->keywords;
		$status = $item->save();
		$product->saved_id = $item->id;
		$product->save();

		return Response()->json([
			'status' => $status,
			'saved_id' => $product->saved_id
		]);
	}

	public function item_unsave(Request $request) {
		$product_id = $request->input('product_id');
		$product = Product::find($product_id);
		$saved_id = $request->input('saved_id');
		$item = Item::find($saved_id);
		$status = $item->delete();
		$product->saved_id = null;
		$product->save();

		return Response()->json([
			'status' => $status,
		]);
	}

	public function get_items(Request $request) {
		$user_id = $request->input('user_id');
		$items = Item::where('user_id', $user_id)->paginate(100);

		return Response()->json([
			'status' => true,
			'data' => $items
		]);
	}

	public function remove_item(Request $request) {
		$item_id = $request->input('item_id');
		$item = Item::find($item_id);
		$status = false;
		$status = $item->delete();

		return Response()->json([
			'status' => $status
		]);
	}

	public function get_products(Request $request) {
		$user_id = $request->input('user_id');
		$user = User::find($user_id);

		$products = Product::where('created_by', $user->id)->paginate(100);
		return Response()->json([
			'status' => true,
			'data' => $products
		]);
	}

	public function set_products(Request $request) {
		$user_id = $request->input('user_id');
		$products = $request->input('data');
		$start_flag = $request->input('start_flag');

		if ($start_flag) {
			$delStatus = Product::where('created_by', $user_id)->delete();
		}

		$query = array();
		$now = date('Y-m-d H:i:s');
		// var_dump($products[0]['top_bsr']);exit;
		foreach ($products as $key => $product) {
			$tempTopBSR = $tempBottomBSR = $brand_img_url = null;
			$img_url = "";
			if (isset($product['top_bsr'])) {
				$tempTopBSR = $product['top_bsr'];
			}
			if (isset($product['bottom_bsr'])) {
				$tempBottomBSR = $product['bottom_bsr'];
			}
			if (isset($product['brand_img_url'])) {
				$brand_img_url = $product['brand_img_url'];
			}
			if (isset($product['img_url'])) {
				$img_url = $product['img_url'];
			}
			array_push($query, array(
					'title' => $product['title'],
					'bullet_points' => $product['bullet_points'],
					'link' => $product['link'],
					'img_url' => $product['img_url'],
					'brand_url' => $product['brand_url'],
					'brand_img_url' => $brand_img_url,
					'price' => $product['price'],
					'top_bsr' => $tempTopBSR,//$product['top_bsr'],
					'bottom_bsr' => $tempBottomBSR, //$product['bottom_bsr'],
					'keywords' => $product['keywords'],
					'created_by' => $user_id,
					'created_at' => $now,
					'updated_at' => $now
				));
		}
		$status = Product::insert($query);
		return Response()->json([
			'status' => $status
		]);
	}

	public function download($id) {
		$items = DB::table('items')->where('user_id', $id)->get();
		$data = [];
		$index = 1;
		$data[] = array('id', 'title', 'bullet_points', 'price', 'BSR', 'bsr', 'link', 'img_url');

		foreach($items as $item) {
			$data[] = array($index, $item->title, $item->bullet_points, $item->price, $item->top_bsr, $item->bottom_bsr, $item->link, $item->img_url);
			$index++;
		}

		$status = DB::table('items')->where('user_id', $id)->delete();

		Excel::create('items', function($excel) use ($data) {

			// Set the spreadsheet title, creator, and description
			$excel->setTitle('Saved Items');
			$excel->setCreator('Alexis Richard')->setCompany('Merch Fox');
			$excel->setDescription('Saved products');

			// Build the spreadsheet, passing in the payments array
			$excel->sheet('sheet1', function($sheet) use ($data) {
				$sheet->fromArray($data, null, 'A1', false, false);
			});

		})->download('xlsx');
	}
}
