<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['prefix' => 'admin'], function ()
{
	Route::group(['prefix' => 'partials'], function ()
	{
		Route::get('tags', ['uses' => 'AdminPartialsController@tags']);
	});

	Route::get('/', ['uses' => 'MainController@admin', 'as' => 'admin']);
});

Route::get('/', ['uses' => 'MainController@index', 'as' => 'home']);
