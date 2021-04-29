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
    Route::resource('posts', 'PostsController');
    Route::get('/posts/delete/{id}', 'PostsController@destroy')->name('posts.delete');

    Route::resource('categories', 'CategoryController');
    Route::get('/categories/delete/{id}', 'CategoryController@destroy')->name('categories.delete');

    Route::resource('comments', 'CommentsController');
    Route::get('/comments/delete/{id}', 'CommentsController@destroy')->name('comments.delete');
});
