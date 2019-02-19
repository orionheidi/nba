<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['guest']],function(){
    Route::get('/register',['as'=> 'show-register', 'uses' => 'RegisterController@create']);
    Route::post('/register','RegisterController@store')->name('register');
    Route::get('/login','LoginController@create')->name('show-login');
    Route::post('/login','LoginController@store')->name('login');
});

Route::group(['middleware' => ['auth']],function(){
    // Route::get('/users/team','UserController@index')->name('users-team');
    Route::get('/teams','TeamsController@index')->name('teams-index');
    Route::get('/teams/{id}','TeamsController@show')->name('teams-show');
    Route::get('/players/{id}','PlayerController@show')->name('players-show');
    Route::get('/logout','LoginController@logout')->name('logout');
});

Route::post('/teams/{teamId}/comments', ['as' => 'show-comments', 'uses' => 'CommentsController@store']);


// Route::get('/teams','TeamsController@index')->name('teams-index');
// Route::get('/teams/{id}','TeamsController@show')->name('teams-show');
// Route::get('/players/{id}','PlayerController@show')->name('players-show');
