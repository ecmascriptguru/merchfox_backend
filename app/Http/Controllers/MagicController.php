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
		$this->middleware('auth');
	}
    
    /**
     *
     */
    public function index() {
        echo "Hello";
        exit;
    }

    /**
     *
     */
    public function edit() {
        echo "Edit";
        exit;
    }
}
