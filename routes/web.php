<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('MasterSiswa.add_siswa');
});
//error
Route::get('/error/','Controller@error');

Route::get('/register','RegisterOnlineController@add');
Route::post('/pos_tregister','RegisterOnlineController@store');

Route::post('/siswa/postdatasiswa','MasterSiswaController@store');

//Master Barang 
Route::get('/master_barang/add','MasterBarangController@add');
Route::post('/master_barang/store','MasterBarangController@store');
Route::get('/master_barang/edit/{id}','MasterBarangController@edit');
Route::get('/master_barang/edit/','Controller@error');
Route::post('/master_barang/update/{id}','MasterBarangController@update');
Route::get('/master_barang/show','MasterBarangController@show');
Route::get('/master_barang/getData','MasterBarangController@getData');
Route::post('/master_barang/delete','MasterBarangController@delete');

//Penerimaan Barang
Route::get('/penerimaan_barang/add','PenerimaanController@add');
Route::post('/penerimaan_barang/store','PenerimaanController@store');
Route::get('/penerimaan_barang/show','PenerimaanController@show');
Route::get('/penerimaan_barang/getData','PenerimaanController@getData');
Route::post('/penerimaan_barang/temp_store','PenerimaanController@temp_store');
//detail penerimaan barang
Route::post('/detail_penerimaan/delete','DetailPenerimaanController@delete');
//test
Route::get('/penerimaan_barang/testing','PenerimaanController@testGetData');

//Penjualan Barang
Route::get('/penjualan_barang/add','PenjualanController@add');
Route::post('/penjualan_barang/store','PenjualanController@store');

//Retur barang
Route::get('/retur_barang/add','ReturController@add');
Route::post('/retur_barang/store','ReturController@store');