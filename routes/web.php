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

Route::get('/', 'ShopController@list')->name('list');
Route::get('/cart', 'ShopController@cart')->middleware('auth')->name('cart');
Route::post('/cart/add', 'ShopController@add')->middleware('auth')->name('cart_add');
Route::post('/cart/delete', 'ShopController@delete')->middleware('auth')->name('cart_delete');
Route::post('/cart/update', 'ShopController@update')->middleware('auth')->name('cart_update');

Auth::routes();
