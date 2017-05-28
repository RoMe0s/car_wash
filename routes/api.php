<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function() {

    Route::group(['middleware' => 'guest', 'prefix' => 'auth'], function() {

        Route::post('login', [
            'as' => 'post.login',
            'uses' => 'Api\AuthController@login'
        ]);

        Route::get('logout', [
            'as' => 'api.logout',
            'uses' => 'Api\AuthController@logout'
        ]);

    });

    Route::group(['middleware' => []], function() {

        Route::post('object', [
            'as' => 'api.object.store',
            'uses' => 'Api\ObjectController@store'
        ]);
        
        Route::post('object/{id}', [
            'as' => 'api.object.update',
            'uses' => 'Api\ObjectController@update'
        ]);

        Route::post('object/{id}/services', [
            'as' => 'api.object.services',
            'uses' => 'Api\ObjectController@storeService'
        ]);

        Route::post('object/{object_id}/service/{service_id}/remove', [
            'as' => 'api.object.service.remove',
            'uses' => 'Api\ObjectController@removeService'
        ]);
    
    });

});
