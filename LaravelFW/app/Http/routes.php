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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sql',[
	'as' => 'sql',
	'uses'=> 'SlideShareController@inBD'
]);

/*
Route::get('/slide', [
	'as' => 'slide',
	'uses' => 'SlideShareController@getAPI'
]);*/

Route::post('/slide', [
	'as' => 'slide.getTest',
	'uses' => 'SlideShareController@inDB'
]);

Route::get('test', function () {
    return view('slides.index');
});

Route::auth();

Route::get('/home', 'HomeController@index');
