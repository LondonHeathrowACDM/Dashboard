<?php
//Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {
//    Route::get('/', 'Admin\HomeController@getAdminPanel')->name('home');
//});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', 'System\DashboardController@getDashboard')->name('acdm');
    Route::get('total-deps', function(){
        return \App\Departures::count();
    });
});

Auth::routes();

