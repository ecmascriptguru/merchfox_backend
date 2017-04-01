<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
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
		$item = new Item;
		$item->user_id = $request->input('user_id');
		$item->title = $request->input('title');
		$item->link = $request->input('link');
		$item->img_url = $request->input('img_url');
		$item->price = $request->input('price');
		$item->top_bsr = $request->input('top_bsr');
		$item->bottom_bsr = $request->input('bottom_bsr');
		$item->keywords = $request->input('keywords');
		$status = $item->save();

		return Response()->json([
			'status' => $status,
			'id' => $item->id
		]);
	}

	public function item_unsave(Request $request) {
		$id = $request->input('id');
		$item = Item::find($id);
		// $item->status = "inactive";
		// $status = $item->save();
		$status = $item->delete();

		return Response()->json([
			'status' => $status,
		]);
	}
}
