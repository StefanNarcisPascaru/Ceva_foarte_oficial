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
<<<<<<< HEAD
Route::get('/slideAv',function () {
    return view('slides.avansat');
});
Route::post('/slideAv', [
	'as' => 'slide.api.av',
	'uses' => 'SlideShareController@cautaAvansatSlide'
]);

=======


Route::post('/slide', [
	'as' => 'slide.getTest',
	'uses' => 'SlideShareController@getAPI'
]);
>>>>>>> 3c2cf0f037330df58a7b0d0659fb1e1bdd3792b3
Route::post('/vimeo', [
	'as' => 'vimeo.api',
	'uses' => 'VimeoController@getAPI'
]);
// Route::get('vimeo', function () {
//     return view('vimeo.index');
// });
// Route::get('/vimeo', function(){
// 	return view('vimeo.vimeo');	
// });
Route::get('/vimeo', function () {
    return view('vimeo.index');
});
Route::get('test', function () {
    return view('slides.index');
});
Route::auth();

Route::get('/home', 'HomeController@index');
