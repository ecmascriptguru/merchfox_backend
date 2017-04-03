<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
}
