<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'web'], function() {

	Route::get('/', 'App\Http\Controllers\GaleryController@index');

	Route::resource('galery', 'App\Http\Controllers\GaleryController');
	Route::get('/galery/show/{id}', 'App\Http\Controllers\GaleryController@show');

	Route::resource('photo', 'App\Http\Controllers\PhotoController');
	Route::get('/photo/details/{id}', 'App\Http\Controllers\PhotoController@details');
	Route::get('/photo/create/{id}', 'App\Http\Controllers\PhotoController@create');


	Auth::routes();

	Route::get('/home', 'App\Http\Controllers\GaleryController@index');

	Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
	
});
