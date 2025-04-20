<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'ward', 'namespace' => '\App\Http\Controllers\Ward'], function () {
    Route::get('report', 'WardController@report');
    // Route::get('report-upload', 'WardController@report_upload');
    // Route::get('submitted-units-data-add', 'WardController@submitted_units_data_add');
    Route::get('report/ward-report-sum', 'WardController@ward_report_sum');
    Route::get('ward-report-monthly', 'WardController@ward_report_monthly');
    //WardReportStatusController
    Route::get('unit/report-check', 'WardReportStatusController@report_check'); //for see unit report from ward dashboard
    Route::get('unit/total-unit-report', 'WardTotalUnitSubmittedDataController@total_unit_report'); //for see unit report from ward dashboard
});

Route::group(['prefix' => 'ward', 'namespace' => '\App\Http\Controllers\Ward'], function () {
    // Route::get('report/upload', 'UnitController@report_upload');
    // Route::get('report/unit-report-sum', 'UnitController@unit_report_sum');
    // Route::get('unit-report-monthly', 'UnitController@unit_report_monthly');
    // Route::get('report-check', 'UnitController@report_check');
    Route::get('total-approved-ward-report', 'WardController@total_approved_ward_report');
});
