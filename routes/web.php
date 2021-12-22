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
        Route::post('/add', 'ProductController@addCart')->name('add');
        Route::delete('/delete/{cart_id}', 'ProductController@destroy')->name('delete');
    });

    Route::prefix('transaction')->name('transaction.')->group(function () {
        Route::post('/submited', 'TransactionController@submitted')->name('submitted');
        Route::get('/finish', 'TransactionController@finished')->name('finished');
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
    Route::post("/user", 'UserController@userLogout')->name('logout');

    Route::prefix('user')->group(function () {
        Route::get('/cart', 'UserController@cartView')->name('cart');
    });
});

Route::prefix('dashboard')->name('admin.')->middleware('can:super-admin')->group(function () {
    Route::get('/', 'DashboardController')->name('dashboard');

    Route::name('product.')->group(function () {
        Route::get('/product-list', 'ProductController@index')->name('list');
    });

    Route::name('transaction.')->group(function () {
        Route::get('/transaction-list', 'TransactionController@index')->name('list');
        Route::post('/confirmed/{Transaction}', 'TransactionController@confirmed')->name('confirmed');
    });
});