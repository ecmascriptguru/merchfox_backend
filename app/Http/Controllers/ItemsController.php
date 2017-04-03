<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
