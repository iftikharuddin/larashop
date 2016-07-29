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
Route::get('/add-to-cart/{id}','ProductController@getAddToCart');
Route::get('/shopping-cart','ProductController@getCart');

Route::get('/checkout', 'ProductController@getCheckout');
Route::post('/checkout', 'ProductController@postCheckout');

Route::group(['prefix' => 'user'], function(){
	Route::group(['middleware' => 'guest'], function(){
		Route::get('/signup','UserController@getSignup');
		Route::post('/signup','UserController@postSignup');
		Route::get('/signin','UserController@getSignin');
		Route::post('/signin','UserController@postSignin');
	});
	
	Route::group(['middleware' => 'auth'], function(){
		Route::get('/profile',[
			'uses' => 'UserController@getProfile',
			'as' => 'user.profile'
		]);

		Route::get('/logout',[
			'uses' => 'UserController@getLogout',
			'as' => 'user.logout'
		]);
	});

	
});

