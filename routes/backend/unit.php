<?php

use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'unit', 'namespace' => '\App\Http\Controllers\Unit'], function () {
    Route::get('report/upload', 'UnitController@report_upload');
    Route::get('report/unit-report-sum', 'UnitController@unit_report_sum');
    Route::get('unit-report-monthly', 'UnitController@unit_report_monthly');
    // Route::get('report-check', 'UnitController@report_check');
    Route::get('total-approved-unit-report', 'UnitController@total_approved_unit_report');
});
