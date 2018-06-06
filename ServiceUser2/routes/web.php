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


Route::get('/login', 'AuthController@index')->name('login.show');
Route::post('/login', 'AuthController@login')->name('login.action');

Route::get('/session', function(){
    Session::put('progress', '5%');
    // dd(Session::get('progress'));
});

Route::group(['middleware' => 'AuthToken'], function() {
    Route::get('/', function () {
        return view('welcome');
    });    
});


// Route::post('/check');
