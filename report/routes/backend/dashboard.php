<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Unit\IsUnitPermittedUser;
use App\Http\Middleware\Ward\IsWardPermittedUser;

Route::group(['prefix' => 'dashboard', 'namespace' => '\App\Http\Controllers\Dashboard'], function () {
    Route::get('unit', 'DashboardController@unit');
    Route::get('ward', 'DashboardController@ward');
    Route::get('thana', 'DashboardController@thana');
    Route::get('admin', 'DashboardController@admin');
});
