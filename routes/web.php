<?php

use Illuminate\Support\Facades\Route;



Route::get('/','welcomeController@index')->name('welcome');
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->where('provider', 'facebook|google|twitter');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('provider', 'facebook|google|twitter');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
