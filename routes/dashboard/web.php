<?php
Route::prefix('dashboard')->name('dashboard.')->group(function(){
    route::resource('/categories','categoryController');
    ///////
    route::get('/','welcomeController@index')->name('welcome');

});