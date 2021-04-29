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

Route::group(['prefix' => 'admin', 'middleware' => ['auth','permission']], function ($route) {
    Route::resource('media', 'MediaController');
    Route::get('/media/delete/{id}', 'MediaController@destroy')->name('media.delete');
});
