<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Auth::routes();

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'), function() {
    Route::get('/', 'PagesController@home');

    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::get('users', 'UsersController@index');
    Route::get('users/create', 'UsersController@create');
    Route::post('users/create', 'UsersController@store');
    Route::get('users/{id?}/edit', 'UsersController@edit');
    Route::post('users/{id?}/edit', 'UsersController@update');
    Route::get('users/{id?}/delete', 'UsersController@delete');
    Route::get('users/{id?}/restore', 'UsersController@restore');

    Route::get('posts', 'PostController@index');
    Route::get('posts/{id?}/show', 'PostController@show');
    Route::get('posts/create', 'PostController@create');
    Route::post('posts/create', 'PostController@store');
    Route::get('posts/{id?}/edit', 'PostController@edit');
    Route::post('posts/{id?}/edit', 'PostController@update');
    Route::get('posts/{id?}/delete', 'PostController@delete');
    Route::post('posts/{id?}/add-comment', 'PostController@addComment');
});


