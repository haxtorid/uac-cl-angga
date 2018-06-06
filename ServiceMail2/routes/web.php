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
    return view('welcome');
});
Route::get('/callback', 'AuthController@callback');


Route::group(['middleware' => 'authsso'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/mail', 'EmailController@index')->name('inbox');
    Route::get('/mail/sent', 'EmailController@sent')->name('sentbox');
    Route::get('/mail/show/{id}', 'EmailController@show');
    Route::get('/mail/compose', 'EmailController@compose');
    Route::post('/mail/compose', 'EmailController@create');
});


