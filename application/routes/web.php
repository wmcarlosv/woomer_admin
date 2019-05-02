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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'], function(){
	Route::resource('config_woocommerces','ConfigWoocommercesController');
	Route::get('/wocommerce/orders','WoocommercesController@orders')->name('woocommerce.orders');
	Route::get('/wocommerce/load_orders/{id}','WoocommercesController@load_orders')->name('woocommerce.load.orders');
	Route::get('/wocommerce/order/{id}/{shop}','WoocommercesController@order')->name('woocommerce.order');
});
