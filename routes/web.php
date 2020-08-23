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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Product
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/detail/{id}', 'ProductController@detail');
// End Product

// Transaction
Route::get('/transaction', 'TransactionController@index')->name('transaction');
Route::post('/transaction/store', 'TransactionController@store')->name('transaction.store');
Route::post('/transaction/proses/{id}', 'TransactionController@proses');
Route::post('/transaction/selesai/{id}', 'TransactionController@selesai');
