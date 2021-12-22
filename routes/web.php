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

// Home route
Route::get('/', 'HomeController')->name('index');

// For Product
Route::name('product.')->group(function () {
    Route::get("/product/{product_id}", 'ProductController@show')->name('view');

    Route::prefix('cart')->name('cart.')->group(function () {
        Route::post('add', 'ProductController@addCart')->name('add');
    });
});

// For user
Route::name('user.')->group(function () {
    Route::middleware('not-user')->group(function () {
        Route::get("/register", 'UserController@create')->name('register');
        Route::get("/login", 'UserController@index')->name('login');
    });
    Route::post("/register", 'UserController@store')->name('store');
    Route::post("/login", 'UserController@userLogin')->name('validate');
    Route::delete("/user", 'UserController@userLogout')->name('logout');
});

Route::prefix('dashboard')->middleware('can:super-admin')->group(function () {
    Route::get('/', 'DashboardController')->name('admin.dashboard');
});