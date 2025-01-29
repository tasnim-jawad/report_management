<?php

use App\Modules\Management\User\Controllers\Controller;
use Illuminate\Support\Facades\Route;



Route::prefix('v1')->group(function () {
    Route::prefix('user-test-module')->group(function () {
        Route::get('', [Controller::class,'index']);
    });
});