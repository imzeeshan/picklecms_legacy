<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  Route::group(['prefix' => 'api', 'middleware' => ['auth','permission']], function ($route) {

}
*/

Route::get('/user/create_token', 'UserController@create_token')->name('create.token');
Route::get('/user/revoke_token', 'UserController@revoke_token')->name('revoke.token');

Route::group(['prefix' => '/', 'middleware' => ['auth:sanctum','throttle:10']], function ($route) {
    Route::apiResource('user', 'UserController');
});
