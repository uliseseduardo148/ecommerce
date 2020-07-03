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

/*Route::get('/', function () {
    return view('welcome');
});*/

//las siguientes rutas pertenecen a las interfaces del cliente
Route::get('/', 'CartController@shop')->name('shop');
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');

Route::get('/checkout', 'CheckoutController@index');

Route::get('/product-name/{slug}', 'ProductController@show');

Route::get('/admin', 'Auth\LoginController@showLoginForm');

//las siguientes rutas pertenecen a las interfaces del administrador
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/logout', 'Auth\LoginController@logout');

    Route::resource('/admin/products', 'ProductController');
    Route::get('/admin/products/edit/{id}', 'ProductController@edit');
    Route::post('/admin/products/destroy/{id}', 'ProductController@destroy');

    Route::resource('/admin/users', 'UserController');
    Route::get('/admin/users/edit/{id}', 'UserController@edit');
    Route::post('/admin/users/destroy/{id}', 'UserController@destroy');
});

Auth::routes();
