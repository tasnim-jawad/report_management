<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return redirect()->to('/login');
});
/*
|--------------------------------------------------------------------------
| frontend Routes
|--------------------------------------------------------------------------
|
*/
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/test.php';
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
require_once __DIR__ . '/backend/dashboard.php';
require_once __DIR__ . '/backend/thana.php';
require_once __DIR__ . '/backend/ward.php';
require_once __DIR__ . '/backend/unit.php';
