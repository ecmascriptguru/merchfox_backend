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

	Route::post('products/get', [
		'uses' => 'Auth\APIController@get_products',
		'as' => 'api_get_products'
	]);

	Route::post('products/set', [
		'uses' => 'Auth\APIController@set_products',
		'as' => 'api_get_products'
	]);

	Route::group(['prefix' => 'items/'], function() {
		Route::post('save', [
			'uses' => 'Auth\APIController@item_save',
			'as' => 'api_item_save'
		]);

		Route::post('unsave', [
			'uses' => 'Auth\APIController@item_unsave',
			'as' => 'api_item_unsave'
		]);

		Route::post('get', [
			'uses' => 'Auth\APIController@get_items',
			'as' => 'api_get_items'
		]);

		Route::post('del', [
			'uses' => 'Auth\APIController@remove_item',
			'as' => 'api_delete_item'
		]);

		Route::get('download/{id}', [
			'uses' => 'Auth\APIController@download',
			'as' => 'api_download_items'
		]);
	});
});