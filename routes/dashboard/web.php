<?php
Route::prefix('dashboard')->name('dashboard.')
->middleware(['auth','role:super_admin|admin'])
->group(function(){
    route::resource('/categories','categoryController');
    ///////
    route::get('/','welcomeController@index')->name('welcome');

});