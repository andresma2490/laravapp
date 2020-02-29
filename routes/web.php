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

Route::get('news/{number?}', function($number=' '){
    return view('news', compact('number'));
})
->name('news')
->where('number', '[0-9]+');

Route::get('us/{name?}', function($name=null){
    $team = ['me', 'myself', 'and Irene'];
    //return view('us', ['team'=>$team, ...]); con blade usar compact, evita la duplicidad
    return view('us', compact('team', 'name'));
})
->name('us');