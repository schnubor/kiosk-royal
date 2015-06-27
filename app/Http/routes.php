<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Pages */
Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::get('/backend', [
    'as' => 'backend',
    'middleware' => 'auth',
    'uses' => 'PagesController@backend'
]);

/* Session */
get('/login', [
    'as' => 'login',
    'middleware' => 'guest',
    'uses' => 'SessionsController@create'
]);

post('/login', [
    'as' => 'login',
    'middleware' => 'guest',
    'uses' => 'SessionsController@store'
]);

get('/logout', [
    'as' => 'logout',
    'middleware' => 'auth',
    'uses' => 'SessionsController@destroy'
]);

/* User */
get('/user', [
    'as' => 'user',
    'uses' => 'UsersController@index'
]);

post('/user/create', [
    'as' => 'post.create.user',
    'middleware' => 'auth',
    'uses' => 'UsersController@store'
]);

delete('/user/{id}/delete', [
    'as' => 'delete.user',
    'middleware' => 'auth',
    'uses' => 'UsersController@destroy'
]);

/* Category */
post('/category/create', [
    'as' => 'post.create.category',
    'middleware' => 'auth',
    'uses' => 'CategoriesController@store'
]);

post('category/{id}/edit', [
    'as' => 'edit.category',
    'middleware' => 'auth',
    'uses' => 'CategoriesController@update'
]);

get('/category/{id}', [
    'as' => 'get.category',
    'uses' => 'CategoriesController@show'
]);

delete('/category/{id}/delete', [
    'as' => 'delete.category',
    'middleware' => 'auth',
    'uses' => 'CategoriesController@destroy'
]);

/* Project */
post('/project/create', [
    'as' => 'post.create.project',
    'middleware' => 'auth',
    'uses' => 'ProjectsController@store'
]);

post('project/{id}/edit', [
    'as' => 'edit.project',
    'middleware' => 'auth',
    'uses' => 'ProjectsController@update'
]);

get('/project/{id}', [
    'as' => 'get.project',
    'uses' => 'ProjectsController@show'
]);

delete('/project/{id}/delete', [
    'as' => 'delete.project',
    'middleware' => 'auth',
    'uses' => 'ProjectsController@destroy'
]);

/* Image */
post('/image/create', [
    'as' => 'post.create.image',
    'middleware' => 'auth',
    'uses' => 'ImagesController@store'
]);

delete('/image/{id}/delete', [
    'as' => 'delete.image',
    'middleware' => 'auth',
    'uses' => 'ImagesController@destroy'
]);

