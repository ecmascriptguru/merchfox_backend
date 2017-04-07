<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ItemsController extends Controller
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
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user = Auth::user();
		if ($user->role_id == 1) {
			$items = Item::where('status', 'active')
				->paginate(10);
		} else {
			$items = Item::where('user_id', $user->id)
				->where('status', 'active')
				->paginate(10);
		}

		return view('items.index', ['items' => $items, 'user' => $user]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function show(Item $item)
	{
		return view('items.show', ['item' => $item]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Item $item)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Item $item)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Item  $item
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Item $item)
	{
		$item->delete();

		return redirect()->route('items.index');
	}

	/**
	 *	Remove all records from Items table
	 *
	 *	@param
	 *	@return JSON
	 */
	public function truncate(Request $request) {
		$status = DB::table('items')->truncate();
        return redirect()->route('items.index');
	}

	/**
	 *
	 */
	public function download(Request $request) {
		$user = Auth::user();
		// $removeFlag = $request->input('remove_flag');
		$items = DB::table('items')->where('user_id', $user->id)->get();
		$data = [];
		$index = 1;
		$data[] = array('id', 'title', 'bullet_points', 'price', 'BSR', 'bsr', 'link', 'img_url');

		foreach($items as $item) {
			$data[] = array($index, $item->title, $item->bullet_points, $item->price, $item->top_bsr, $item->bottom_bsr, $item->link, $item->img_url);
			$index++;
		}

		$status = DB::table('items')->where('user_id', $user->id)->delete();

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
