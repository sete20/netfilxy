<?php
Route::prefix('dashboard')->name('dashboard.')
->middleware(['auth','role:super_admin|admin'])
->group(function(){
    route::resource('/categories','categoryController')->except('show');
          ///////
          route::resource('/users','userController')->except('show');
          ///////
    route::resource('/roles','roleController')->except('show');
        //////////////////
    route::get('/','welcomeController@index')->name('welcome');

});