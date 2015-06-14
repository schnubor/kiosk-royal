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

post('/user/delete', [
    'as' => 'delete.user',
    'middleware' => 'auth',
    'uses' => 'UsersController@destroy'
]);
