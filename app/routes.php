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

//Route::group(['prefix' => 'admin'], function ()
//{
//	Route::group(['prefix' => 'partials'], function ()
//	{
//		Route::get('tags', ['uses' => 'AdminPartialsController@tags']);
//	});
//
//	Route::get('/', ['uses' => 'MainController@admin', 'as' => 'admin']);
//});

Route::group(['prefix' => 'api/v1'], function ()
{
	Route::get('tags', ['uses' => 'AnnieDigital\Api\TagController@index', 'as' => 'tags.index']);

	Route::get('projects', ['uses' => 'AnnieDigital\Api\ProjectController@index', 'as' => 'projects.index']);

	Route::post('contact/store', ['uses' => 'AnnieDigital\Api\ContactController@store', 'as' => 'contact.store']);
});

Route::group(['prefix' => 'partials'], function ()
{
	Route::get('details-default', ['uses' => 'PartialsController@detailsDefault']);
	Route::get('details-web', ['uses' => 'PartialsController@detailsWeb']);
});

Route::get('resume', ['as' => 'resume', function ()
{
	$file = realpath(__DIR__ . '/../annie-lu-resume.pdf');

	return Response::download($file);
}]);

Route::get('/', [
	'uses' => 'MainController@index', 'as' => 'home',
]);
