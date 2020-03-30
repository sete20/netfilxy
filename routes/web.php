<?php

use Illuminate\Support\Facades\Route;


Route::resource('movies','MovieController')->only(['index','show']);
Route::get('/','welcomeController@index')->name('welcome');

Route::post('/movies/{movie}/increment_views','MovieController@increment_views')->name('movies.increment_views');

Route::get('/','welcomeController@index')->name('welcome');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider', 'facebook|google|twitter');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider', 'facebook|google|twitter');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
