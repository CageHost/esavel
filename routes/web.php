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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('auth/google', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('auth/facebook', 'Auth\RegisterController@redirectFacebook');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleFacebook');

Route::prefix('lapi')->namespace('Lapi')->group(function () {
    Route::get('/user', 'UserController@index');
    Route::get('/games', 'GameController@index');
    Route::get('/game/{id}', 'GameController@show');
    Route::get('/teams', 'TeamController@index');
    Route::get('/team/{id}', 'TeamController@show');
    Route::get('/events', 'EventController@index');
    Route::get('/event/{id}', 'EventController@show');
});

Route::get('/', 'SpaController@index');

// TODO: I forgot,
// TODO: is this required?
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/old/profile', 'ProfileController@index')->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/old/games', 'GameController@index')->name('games');
    Route::get('/old/games/{id}', 'GameController@show');
    Route::get('/old/teams', 'TeamController@index')->name('teams');
    Route::get('/old/teams/{id}', 'TeamController@show');
    Route::get('/old/events', 'EventController@index')->name('events');
    Route::get('/old/events/{id}', 'EventController@show');
});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
