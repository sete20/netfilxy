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

    route::get('/setting/social_login','settingsController@social_login')->name('settings.social_login');

    route::get('/setting/social_inks','settingsController@social_links')->name('settings.social_links');

    route::post('/setting','settingsController@store')->name('settings');
    Route::resource('movies', 'MovieController');
    
});