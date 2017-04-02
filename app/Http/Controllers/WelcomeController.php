<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use App\User;

class WelcomeController extends Controller
{
	//
	/**
	 *
	 */
	public function index() {
		$posts = Post::orderBy('updated_at', 'desc')->limit(5)->get();
		return view('welcome', ['posts' => $posts]);
	}
}
