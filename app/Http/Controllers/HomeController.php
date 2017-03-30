<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($keyword = NULL, Request $request)
    {
        if ($request->isMethod('post')) {
            $keyword = $request->input('keyword');
        }
        if ($keyword) {
            $products = Product::where('title', 'LIKE', '%' . $keyword . '%')->paginate(10);
        } else {
            $products = Product::paginate(10);
        }
        $products->withPath('home/'.$keyword);
        return view('home', ['products' => $products, 'keyword' => $keyword]);
    }

    /**
     * Truncate the products table
     * @return \Illuminate\Http\Response
     */
    public function truncate() {
        $status = DB::table('products')->truncate();
        return redirect()->route('home');
    }
}
