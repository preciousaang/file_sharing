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
})->name('homepage');

Route::namespace('Users')->group(function(){
    Route::get('register', 'RegisterController@form')->name('register-form');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('login', 'LoginController@form')->name('login-form');
    Route::post('login', 'LoginController@login')->name('login');
});