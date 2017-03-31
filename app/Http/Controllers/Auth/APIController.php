<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

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
}
