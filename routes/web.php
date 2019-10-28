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

Route::middleware(['check-user'])->group(function(){
    Route::get('/', function () {
        return redirect()->route('file-list');
    })->name('homepage');

    Route::namespace('Users')->group(function(){
        Route::get('profile', 'UsersController@profile')->name('profile');
        
        Route::get('register', 'RegisterController@form')->name('register-form');
        Route::post('register', 'RegisterController@register')->name('register');
        Route::get('login', 'LoginController@form')->name('login-form');
        Route::post('login', 'LoginController@login')->name('login');
        Route::any('logout', 'LoginController@logout')->name('logout');    
    });

    //Other links
    Route::get('upload', 'FilesController@uploadForm')->name('upload-form');
    Route::post('upload', 'FilesController@upload')->name('upload');
    Route::get('files', 'FilesController@list')->name('file-list');
    Route::get('file/{id}/download', 'FilesController@download')->name('download-file');
    Route::get('files/{dept}', 'FilesController@list')->name('dept-list');
    Route::get('search', 'FilesController@search')->name('search-files');
    Route::get('my-files', 'FilesController@myFiles')->name('my-files');
    Route::get('delete-file/{id}', 'FilesController@delete')->name('delete-file');    
});


Route::get('edit-profile', 'Users\UsersController@edit')->name('edit-profile');
Route::post('edit-profile', 'Users\UsersController@update')->name('update-profile');