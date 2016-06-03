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
Route::get('/slide', function () {
    return view('welcome');
});
Route::post('/slideSi', [
	'as' => 'slide.api.simplu',
	'uses' => 'SlideShareController@cautaSimpluSlide'
]);
Route::get('/slideAv',function () {
    return view('slides.avansat');
});
Route::post('/slideAv', [
	'as' => 'slide.api.av',
	'uses' => 'SlideShareController@cautaAvansatSlide'
]);

Route::post('/vimeo', [
	'as' => 'vimeo.api',
	'uses' => 'VimeoController@getAPI'
]);
Route::get('/vimeo', function () {
    return view('vimeo.index');
});

Route::get('/Cristi', function () {
    return view('welcome');
});    
Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('/slideapi/getAll','SlideApiController@index');

Route::resource('/slideapi/getApi','SlideApiController@get');

Route::get('/documentation', function () {
    return view('documentation');
});