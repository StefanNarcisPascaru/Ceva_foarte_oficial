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
Route::auth();
Route::get('/home', 'HomeController@index');

//narcis
Route::get('test1', 'SlideShareController@getTest');

//sami
//Route::get('sami', 'GitHubController@faCeva');
Route::get('GitHubApi', [
    'as' => 'GitHubApi', 
    'uses' => 'GitHubController@getGitHubApi'
]);

Route::get('create', 'gitHistoryController@create');

// Route::get('/gitHub/create', [
//     'as' => 'create', 
//     'uses' => 'gitHistoryController@create'
// ]);

Route::resource('history','gitHistoryController');