<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'dashboard' , 'namespace' =>'\App\Http\Controllers\Dashboard' ],function(){
    Route::get('unit','DashboardController@unit');
});
