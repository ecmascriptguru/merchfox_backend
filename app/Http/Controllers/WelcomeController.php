<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;

class WelcomeController extends Controller
{
	//
	/**
	 *
	 */
	public function index() {
		$posts = Post::all();

		return view('welcome', ['posts' => $posts]);
	}
}
