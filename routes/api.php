<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('product', 'ProductController');

Route::group(['prefix' => 'v1/'], function() {
	Route::post('login', [
		'uses' => 'Auth\APIController@login',
		'as' => 'api_login'
	]);

	Route::post('items/save', [
		'uses' => 'Auth\APIController@item_save',
		'as' => 'api_item_save'
	]);

	Route::post('items/unsave', [
		'uses' => 'Auth\APIController@item_unsave',
		'as' => 'api_item_unsave'
	]);
});