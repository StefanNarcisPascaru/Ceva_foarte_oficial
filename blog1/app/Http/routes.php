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
Route::resource('vimeoapi','VimeoApiController');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/sql',[
	'as' => 'sql',
	'uses'=> 'SlideShareController@inBD'
]);


Route::post('/slide', [
	'as' => 'slide.getTest',
	'uses' => 'SlideShareController@getAPI'
]);
Route::post('/vimeo/adaugare_favorite', [
	'as' => 'vimeo.adaugare_favorite',
	'uses' => 'VimeoController@adaugare_favorite'
]);
Route::post('/vimeo', [
	'as' => 'vimeo.api',
	'uses' => 'VimeoController@getAPI'
]);

Route::get('/vimeo', function () {
    return view('vimeo.index');
});
Route::get('test', function () {
    return view('slides.index');
});
Route::auth();

Route::get('/home', 'HomeController@index');
