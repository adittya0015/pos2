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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');


    Route::resource('/jenis-barang', 'JenisController')->except([
        'create', 'show'
    ]);

    Route::post('/importjenisbarang', 'JenisController@storeData');

    Route::resource('/UOM', 'UomController')->except([
        'create', 'show'
    ]);

    Route::post('/importuom', 'UomController@storeData');


    Route::resource('/barang', 'BarangController');

    Route::post('/importbarang', 'BarangController@import_excel');

    Route::get('/exportbarang', 'BarangController@export_excel');

    Route::resource('/supplier', 'SupplierController');

    Route::group(['prefix' => 'invoice'], function() {
        //ROUTE UNTUK HALAMAN INVOICE
        Route::get('/new', 'PenerimaanController@create')->name('invoice.create');
        //ROUTE UNTUK MENG-HANDLE DATA YANG DIKIRIM
        Route::post('/', 'PenerimaanController@save')->name('invoice.store');
        Route::get('/{id}', 'PenerimaanController@edit')->name('invoice.edit');
    });
});
