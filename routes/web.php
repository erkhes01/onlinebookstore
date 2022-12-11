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

// composer create-project laravel/laravel laravelwebprog

Route::get('/', function () {
    return redirect('books');
});

// Route::method_name('url_name', 'controller@action');

Route::get('books', 'App\Http\Controllers\MyController@books');
Route::get('book/{id}', 'App\Http\Controllers\MyController@book');

Route::get('loginform', 'App\Http\Controllers\MyController@loginForm');
Route::post('login', 'App\Http\Controllers\MyController@login');
Route::get('logout', function(){
    Session::forget('user');
    return redirect('books');
});

//Seller
Route::get('signupform', function(){
    return view('signupform');
});
Route::post('signup', 'App\Http\Controllers\MyController@signup');
Route::get('confirmed', 'App\Http\Controllers\MyController@confirmed');
//Manager
Route::get('bookform', function(){
    return view('bookform');
});
Route::get('bookform/{id}', 'App\Http\Controllers\MyController@editBook');
Route::post('registerbook', 'App\Http\Controllers\MyController@registerBook');

//Member
Route::get('orderhistory', 'App\Http\Controllers\MyController@orderhistory');
Route::get('purchase/{id}', 'App\Http\Controllers\MyController@purchase');
Route::get('download/{id}', 'App\Http\Controllers\MyController@download');
Route::get('rent/{id}', 'App\Http\Controllers\MyController@rent');
Route::get('payment/{id}', 'App\Http\Controllers\MyController@payment');
Route::post('pay/{id}', 'App\Http\Controllers\MyController@pay');
Route::get('result/{id}', 'App\Http\Controllers\MyController@result');
Route::get('accept/{id}', 'App\Http\Controllers\MyController@accept');
Route::get('extend/{id}', 'App\Http\Controllers\MyController@extend');
Route::get('outofstock/{id}', 'App\Http\Controllers\MyController@outofstock');