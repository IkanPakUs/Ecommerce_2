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
Route::get('/', 'HomeController@index')->name('index');

// For Product
Route::get("/product", 'ProductController@show')->name('product.view');

// For user
Route::name('user.')->group(function () {
    Route::get("/register", 'UserController@create')->name('register');
    Route::get("/login", 'UserController@index')->name('login');
    Route::post("/register", 'UserController@store')->name('store');
    Route::post("/login", 'UserController@userLogin')->name('validate');
    Route::delete("/user", 'UserController@userLogout')->name('logout');
});