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

Route::get('/', function () {
    return view('welcome');
});

//gudang
Route::get('/gudang', 'GudangController@index');
Route::post('/gudang/add', 'GudangController@add');
Route::post('/gudang/edit/{id}', 'GudangController@edit');
Route::post('/gudang/delete/{id}', 'GudangController@delete');

//category
Route::get('/category_barang', 'CategoryBarangController@index');
Route::post('/category_barang/add', 'CategoryBarangController@add');
Route::post('/category_barang/edit', 'CategoryBarangController@edit');
Route::post('/category_barang/delete', 'CategoryBarangController@delete');

//barang
Route::get('/barang', 'BarangController@index');
Route::post('/barang/add', 'BarangController@add');
Route::post('/barang/edit/{id}', 'BarangController@edit');
Route::post('/barang/delete/{id}', 'BarangController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
