<?php
Route::prefix('dashboard')->name('dashboard.')->group(function(){

    route::get('/','welcomeController@index')->name('welcome');

});