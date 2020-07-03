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

// The following routes belong to the client interfaces, no login required
Route::get('/', 'CartController@shop')->name('shop');
Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');
Route::get('/checkout', 'CheckoutController@index');
Route::get('/product-name/{slug}', 'ProductController@show');

// This route opens the login page, it is accessible only by URL
Route::get('/admin', 'Auth\LoginController@showLoginForm');

// The following routes belong to the administrator interfaces
Route::middleware(['auth'])->group(function () {

    // Route that opens the administrator home page
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/logout', 'Auth\LoginController@logout');

    // Product module routes
    Route::resource('/admin/products', 'ProductController');
    Route::get('/admin/products/edit/{id}', 'ProductController@edit');
    Route::post('/admin/products/destroy/{id}', 'ProductController@destroy');

    // Users module routes
    Route::resource('/admin/users', 'UserController');
    Route::get('/admin/users/edit/{id}', 'UserController@edit');
    Route::post('/admin/users/destroy/{id}', 'UserController@destroy');
});

Auth::routes();
