<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  Route::group(['prefix' => 'api', 'middleware' => ['auth','permission']], function ($route) {

}
*/

Route::group(['prefix' => '/', 'middleware' => 'throttle:10'], function ($route) {
    Route::apiResource('user', 'UserController');
});
