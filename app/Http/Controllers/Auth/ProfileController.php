<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * View the user's profile.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		// $request->user() returns an instance of the authenticated user...
		// echo "Hello";
		return view('auth.profile', ['user' => $request->user()]);
	}

	/**
	 * Update the user's profile.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function update(Request $request)
	{
		// $request->user() returns an instance of the authenticated user...
		// echo "Hello";
		var_dump($request);exit;
		return view('auth.profile', ['user' => $request->user()]);
	}
}
