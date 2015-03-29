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
Route::get('player/addInfo', 'PlayerController@editAdd');

Route::get('coach/profile', 'CoachController@index');

Route::get('api/chartData/{user_id}/{metric}', 'PlayerController@chartData');
Route::get('api/chartData/{user_id}', 'PlayerController@getAll');

Route::get('api/coachChartData/{user_id}', 'CoachController@getAll');
Route::get('api/coachChartData/{user_id}/{metric}', 'CoachController@getAll');

Route::get('api/addPlayerInfo/{user_id}', 'PlayerController@getEditInfo');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
