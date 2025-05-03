<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '/user'], function () {
    Route::get('/user-info', [App\Http\Controllers\User\UserController::class, 'user_info']);
    Route::get('/ward-user-info', [App\Http\Controllers\User\UserController::class, 'ward_user_info']);
    Route::get('/thana-user-info', [App\Http\Controllers\User\UserController::class, 'thana_user_info']);
    Route::post('/toggle-dashboard-permission', [App\Http\Controllers\Dashboard\PermissionController::class, 'toggle_dashboard_permission']);

    Route::get('/all', [App\Http\Controllers\User\UserController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\User\UserController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\User\UserController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\User\UserController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\User\UserController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\User\UserController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\User\UserController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\User\UserController::class, 'bulk_import']);
});

Route::group(['prefix' => '/user'], function () {
    Route::get('/show_unit_user', [App\Http\Controllers\Unit\UnitUserController::class, 'show_unit_user']);
    Route::post('/store_unit_user', [App\Http\Controllers\Unit\UnitUserController::class, 'store_unit_user']);
    Route::post('/update_unit_user', [App\Http\Controllers\Unit\UnitUserController::class, 'update_unit_user']);
});

Route::group(['prefix' => 'unit/user'], function () {
    Route::get('/show', [App\Http\Controllers\Unit\UnitUserController::class, 'show']);
    // Route::post('/store', [App\Http\Controllers\Unit\UnitUserController::class, 'store']);
    // Route::post('/update', [App\Http\Controllers\Unit\UnitUserController::class, 'update']);
    // Route::post('/destroy', [App\Http\Controllers\Unit\UnitUserController::class, 'destroy']);
});


Route::group(['prefix' => 'user-role'], function () {
    Route::get('/all', [App\Http\Controllers\User\UserRoleController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\User\UserRoleController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\User\UserRoleController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\User\UserRoleController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\User\UserRoleController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\User\UserRoleController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\User\UserRoleController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\User\UserRoleController::class, 'bulk_import']);
});

Route::group(['prefix' => 'user-class'], function () {
    Route::get('/all', [App\Http\Controllers\User\UserClassController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\User\UserClassController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\User\UserClassController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\User\UserClassController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\User\UserClassController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\User\UserClassController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\User\UserClassController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\User\UserClassController::class, 'bulk_import']);
});

Route::group(['prefix' => 'user-contact'], function () {
    Route::get('/all', [App\Http\Controllers\User\UserContactController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\User\UserContactController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\User\UserContactController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\User\UserContactController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\User\UserContactController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\User\UserContactController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\User\UserContactController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\User\UserContactController::class, 'bulk_import']);
});

Route::group(['prefix' => 'report-uploader'], function () {
    Route::get('/all', [App\Http\Controllers\User\ReportUploaderController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\User\ReportUploaderController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\User\ReportUploaderController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\User\ReportUploaderController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\User\ReportUploaderController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\User\ReportUploaderController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\User\ReportUploaderController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\User\ReportUploaderController::class, 'bulk_import']);
});
