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
	if ( Auth::user()) {
    return view('Backend');
	}
	else {
		return view('/auth/login');
	}
});

Route::resource('golongan','GolonganController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('pegawai','PegawaiController');
Route::resource('jabatan','jabatanController');
Route::resource('kategorilembur','KategoriLemburController');
Route::resource('lemburpegawai','LemburPegawaiController');
Route::resource('tunjangan','TunjanganController');
Route::resource('tunjanganpegawai','TunjanganPegawaiController');
Route::resource('penggajian','PenggajianController');
