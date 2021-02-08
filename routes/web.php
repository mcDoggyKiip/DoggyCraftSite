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

use App\Events\GamemodeStatusChanged;

Auth::routes();

Route::middleware(['auth'])->group( function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('gamemode','GamemodeController');
    Route::resource('permission','PermissionController');
    Route::resource('user', 'UserController');
});

Route::fallback(function () {
    return Redirect::to('/');
});

Route::get('/gmc', function (){
   event(new GamemodeStatusChanged);
});

