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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

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

// TODO: is this required?
// Auth::routes();
// From laravel/framework/blob/5.6/src/Illuminate/Routing/Router.php
// Begin Auth Routes...
// TODO: have to "name" this route because Laravel hardcoded sh8s
$this->get('login', 'SpaController@index')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('password/reset', 'Auth\ResetPasswordController@reset');
// End Auth Routes

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
