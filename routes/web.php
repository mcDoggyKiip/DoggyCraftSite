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

Auth::routes();

Route::middleware(['auth'])->group( function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('gamemode','GamemodeController');
});

Route::fallback(function () {
    return Redirect::to('/');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
