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

Route::get('/','ProductController@getIndex');
Route::get('/signup','UserController@getSignup');
Route::post('/signup','UserController@postSignup');
Route::get('/signin','UserController@getSignin');
Route::post('/signin','UserController@postSignin');

Route::get('/user/profile',[
	'uses' => 'UserController@getProfile',
	'as' => 'user.profile'
]);

