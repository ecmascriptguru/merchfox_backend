<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MagicController extends Controller
{
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}
    
    /**
     *
     */
    public function index() {
        return view('magic.index', ['data' => array()]);
    }

    /**
     *
     */
    public function edit() {
        // return view('magic.edit', ['data' => array()]);
    }
}
