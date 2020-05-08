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
    Route::resource('pages', 'PagesController');
    Route::get('/pages/delete/{id}', 'PagesController@destroy')->name('pages.delete');
});
