<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AuthController;

Route::get('/login', [AuthController::class, 'login']);
