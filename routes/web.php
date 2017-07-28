<?php

Route::get('/', function () {
    return view('welcome');
});

// Tasks

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/completed', 'TasksController@completed');
Route::get('/tasks/create', 'TasksController@create');
Route::get('/tasks/{task}', 'TasksController@show');
Route::get('/tasks/{task}/edit', 'TasksController@edit');

Route::post('/tasks/', 'TasksController@store');

Route::post('/tasks/{task}', 'TasksController@update');

// Posts

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/tags/{tag}', 'TagsController@index');

Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'PostsController@comment');

// Navigation

Route::get('/about', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Accounts & Auth

Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/{user}/help', 'UsersController@alarm');
Auth::routes();
Route::post('/users/profile', 'UsersController@update');

