<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('logout', [
    'as' => 'logout',
    'uses' => function() {

        \Illuminate\Support\Facades\Auth::logout();

        dd(\Illuminate\Support\Facades\Auth::user());

        return redirect(route('home'));

    }
]);