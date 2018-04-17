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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/profile', 'ProfileController@index')->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::get('/games', 'GameController@index')->name('games');
    Route::get('/games/{id}', 'GameController@show');
    Route::get('/teams', 'TeamController@index')->name('teams');
    Route::get('/teams/{id}', 'TeamController@show');
    Route::get('/events', 'EventController@index')->name('events');
    Route::get('/events/{id}', 'EventController@show');
});

Route::get('auth/google', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('auth/facebook', 'Auth\RegisterController@redirectFacebook');
Route::get('auth/facebook/callback', 'Auth\RegisterController@handleFacebook');

Route::get('/user', 'UserController@index');

Route::prefix('lapi')->middleware(['auth'])->namespace('Lapi')->group(function () {
    Route::get('/user', 'UserController@index');
    Route::get('/games', 'GameController@index');
    Route::get('/games/{id}', 'GameController@show');
    Route::get('/teams', 'TeamController@index');
    Route::get('/teams/{id}', 'TeamController@show');
    Route::get('/events', 'EventController@index');
    Route::get('/events/{id}', 'EventController@show');
});

Route::get('/{any}', 'SpaController@index')->where('any', '.*');
