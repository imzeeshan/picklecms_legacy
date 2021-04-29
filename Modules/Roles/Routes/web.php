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



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function ($route) {
    Route::resource('roles', 'RolesController');
    Route::get('/roles/delete/{id}', 'RolesController@destroy')->name('roles.delete');

    Route::resource('permissions', 'PermissionsController');
    Route::get('/permissions/delete/{id}', 'PermissionsController@destroy')->name('permissions.delete');

});


