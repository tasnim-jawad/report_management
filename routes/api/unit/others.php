<?php

use Illuminate\Support\Facades\Route;






Route::group(['prefix' => 'unit'], function () {
    Route::get('/uploaded-data', [App\Http\Controllers\Unit\UnitController::class, 'report_upload_api']);
    Route::get('/bm-category-wise', [App\Http\Controllers\Unit\UnitController::class, 'bm_category_wise']);
    Route::get('/expense-category-wise', [App\Http\Controllers\Unit\UnitController::class, 'expense_category_wise']);

    Route::get('/report-check', [App\Http\Controllers\Unit\UnitController::class, 'report_check']);
    Route::get('/check-report-info', [App\Http\Controllers\Unit\UnitController::class, 'check_report_info']);
    Route::get('/check-report-info-in-range', [App\Http\Controllers\Unit\UnitController::class, 'check_report_info_in_range']);
    Route::get('/uploaded-data-monthly', [App\Http\Controllers\Unit\UnitController::class, 'report_upload_monthly']);
    Route::get('/report-status', [App\Http\Controllers\Unit\UnitController::class, 'report_status']);
    Route::get('/report-joma', [App\Http\Controllers\Unit\UnitController::class, 'report_joma']);
});

Route::group(['prefix' => 'notification'], function () {
    Route::get('/all-notification-for-unit', [App\Http\Controllers\Notification\NotificationController::class, 'all_notification_for_unit']);
});
Route::group(['prefix' => 'notification-seen'], function () {
    Route::post('/mark-as-seen', [App\Http\Controllers\Notification\NotificationSeenController::class, 'mark_as_seen']);
});


Route::group(['prefix' => 'reset'], function () {
    Route::get('/unit', [App\Http\Controllers\ResetData::class, 'unit_data_reset']);
    Route::get('/ward', [App\Http\Controllers\ResetData::class, 'ward_data_reset']);
    Route::get('/thana', [App\Http\Controllers\ResetData::class, 'thana_data_reset']);
});
