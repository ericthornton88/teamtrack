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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('player/profile', 'PlayerController@index');
Route::get('coach/profile', 'CoachController@index');

Route::get('api/chartData/{metric}', 'PlayerController@chartData');
Route::get('api/chartData', 'PlayerController@getAll');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
