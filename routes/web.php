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
    return view('home');
});

Route::get('news/{number?}', 'PagesController@news')->name('news')->where('number', '[0-9]+');

Route::get('us/{name?}', 'PagesController@us')->name('us');