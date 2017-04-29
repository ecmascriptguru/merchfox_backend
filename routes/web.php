<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
	'uses' => 'WelcomeController@index',
	'as' => 'welcome'
]);

Auth::routes();

Route::get('home', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);

Route::post('home', [
	'uses' => 'HomeController@index',
	'as' => 'home_post'
]);

Route::get('home/{keyword}', [
	'uses' => 'HomeController@index',
	'as' => 'home'
]);

Route::get('profile', [
	'uses' =>'Auth\ProfileController@index',
	'as' => 'profile'
]);

Route::post('profile', [
	'uses' =>'Auth\ProfileController@update',
	'as' => 'profile'
]);

Route::post('truncate', [
	'uses' => 'HomeController@truncate',
	'as' => 'truncate'
]);

Route::post('items/truncate', [
	'uses' => 'ItemsController@truncate',
	'as' => 'truncate_items'
]);

Route::get('items/download', [
	'uses' => 'ItemsController@download',
	'as' => 'excel_download'
]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::resource('items', 'ItemsController');

Route::group(['prefix' => 'magic'], function() {
	Route::get('/', [
		'uses' => 'MagicController@index',
		'as' => 'magic_index'
	]);

	Route::get('/edit', [
		'uses' => 'MagicController@edit',
		'as' => 'magic_edit'
	]);
});