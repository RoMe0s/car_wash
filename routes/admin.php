<?php

Route::group(['prefix' => 'admin'], function() {

    Route::group(['prefix' => 'auth', 'middleware' => 'guest'], function() {

        Route::get('login', [
            'as' => 'admin.login',
            'uses' => 'Admin\AuthController@index'
        ]);

    });

    Route::group(['middleware' => ['admin']], function() {
    
        Route::get('/', [
            'as' => 'admin',
            'uses' => 'Admin\DefaultController@index'
        ]);
    
    });

    
});
