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

Route::get('news', 'PagesController@news')->name('news');

Route::get('news/detail/{id?}', 'PagesController@newsDetail')->name('news.detail')->where('id', '[0-9]+');

Route::post('news', 'PagesController@newsCreate')->name('news.create');

Route::get('news/edit/{id?}', 'PagesController@newsEdit')->name('news.edit');
Route::put('news/edit/{id?}', 'PagesController@newsUpdate')->name('news.update');

Route::delete('news/delete/{id?}', 'PagesController@newsDelete')->name('news.delete');

Route::get('us/{name?}', 'PagesController@us')->name('us');