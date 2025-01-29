<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'report-info'], function () {
    Route::get('/all', [App\Http\Controllers\Report\ReportInfoController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Report\ReportInfoController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Report\ReportInfoController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Report\ReportInfoController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Report\ReportInfoController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Report\ReportInfoController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Report\ReportInfoController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Report\ReportInfoController::class, 'bulk_import']);
});

Route::group(['prefix' => 'report-management-control'], function () {
    // Route::get('/unit-active-report', [App\Http\Controllers\Report\ReportManagementControlController::class, 'unit_active_report']);
    Route::get('/active-report/{org_type}', [App\Http\Controllers\Report\ReportManagementControlController::class, 'active_report']);
    // Route::get('/ward-active-report', [App\Http\Controllers\Report\ReportManagementControlController::class, 'ward_active_report']);
});
