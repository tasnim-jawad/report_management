<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::group(['prefix' => '/user'], function () {
        Route::post('/login', 'LoginController@login');
    });
});


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::get('user/check_user', [App\Http\Controllers\Auth\LoginController::class, 'check_user']);
});
