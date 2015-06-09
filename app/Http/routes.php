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
Route::get('/login', [
    'as' => 'login',
    'middleware' => 'guest',
    'uses' => 'SessionsController@create'
]);

Route::post('/login', [
    'as' => 'login',
    'middleware' => 'guest',
    'uses' => 'SessionsController@store'
]);
