<?php

Route::get('/', function () {
    $name = 'Dmitry';
    //)->with(varname, varvalue) //, []) //compact(varname))
    return view('welcome', ['name' => $name]);
});

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');
Route::get('/tasks/completed', 'TasksController@completed');

Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/about', function() { return view('about'); });

Route::get('/users/{id}', 'UsersController@show');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'PostsController@comment');

Auth::routes();
