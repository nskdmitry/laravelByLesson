<?php

Route::get('/', function () {
    $name = 'Dmitry';
    //)->with(varname, varvalue) //, []) //compact(varname))
    return view('welcome', ['name' => $name]);
});

// Tasks

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/completed', 'TasksController@completed');
Route::get('/tasks/create', 'TaskController@create');
Route::get('/tasks/{task}', 'TasksController@show');
Route::get('/tasks/{task}/edit', 'TasksController@edit');

Route::post('/tasks/', 'TasksController@store');

Route::patch('/tasks/{task}', 'TaskController@update');

// Posts

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'PostsController@comment');

// Navigation

Route::get('/about', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Accounts & Auth

Route::get('/users/{id}', 'UsersController@show');
Auth::routes();
Route::post('/users/profile', 'UsersController@update');

