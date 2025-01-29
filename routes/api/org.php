<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'org-area'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgAreaController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgAreaController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgAreaController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgAreaController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgAreaController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgAreaController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgAreaController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgAreaController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-type'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgTypeController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgTypeController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgTypeController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgTypeController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgTypeController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgTypeController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgTypeController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgTypeController::class, 'bulk_import']);
});






Route::group(['prefix' => 'org-city'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgCityController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgCityController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgCityController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgCityController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgCityController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgCityController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgCityController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgCityController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-thana'], function () {
    Route::get('/city-wise-thana/{city_id}', [App\Http\Controllers\Organization\OrgThanaController::class, 'city_wise_thana']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgThanaController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgThanaController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgThanaController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgThanaController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgThanaController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgThanaController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgThanaController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgThanaController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-ward'], function () {
    Route::get('/thana-wise-ward', [App\Http\Controllers\Organization\OrgWardController::class, 'thana_wise_ward']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgWardController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgWardController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgWardController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgWardController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgWardController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgWardController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgWardController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgWardController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-unit'], function () {
    Route::get('/details', [App\Http\Controllers\Organization\OrgUnitController::class, 'details']);
    Route::get('/ward-wise-unit', [App\Http\Controllers\Organization\OrgUnitController::class, 'ward_wise_unit']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgUnitController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgUnitController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgUnitController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgUnitController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgUnitController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgUnitController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgUnitController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgUnitController::class, 'bulk_import']);
});









Route::group(['prefix' => 'org-city-user'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgCityUserController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgCityUserController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgCityUserController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgCityUserController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgCityUserController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgCityUserController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgCityUserController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgCityUserController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-thana-user'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgThanaUserController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-ward-user'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgWardUserController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgWardUserController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgWardUserController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgWardUserController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgWardUserController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgWardUserController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgWardUserController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgWardUserController::class, 'bulk_import']);
});

Route::group(['prefix' => 'org-unit-user'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgUnitUserController::class, 'bulk_import']);
});









Route::group(['prefix' => 'org-city-responsible'], function () {
    Route::get('/show-user/{id}', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'show_user']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgCityResponsibleController::class, 'bulk_import']);
});
Route::group(['prefix' => 'org-thana-responsible'], function () {
    Route::get('/show-user/{id}', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'show_user']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class, 'bulk_import']);
});
Route::group(['prefix' => 'org-ward-responsible'], function () {
    Route::get('/show-user/{id}', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'show_user']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgWardResponsibleController::class, 'bulk_import']);
});
Route::group(['prefix' => 'org-unit-responsible'], function () {
    Route::get('/show_user/{user_id}', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'show_user']);

    Route::get('/all', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class, 'bulk_import']);
});








Route::group(['prefix' => 'responsibility'], function () {
    Route::get('/all', [App\Http\Controllers\Organization\ResponsibilityController::class, 'all']);
    Route::get('/show/{id}', [App\Http\Controllers\Organization\ResponsibilityController::class, 'show']);
    Route::post('/store', [App\Http\Controllers\Organization\ResponsibilityController::class, 'store']);
    Route::post('/update', [App\Http\Controllers\Organization\ResponsibilityController::class, 'update']);
    Route::post('/soft_delete', [App\Http\Controllers\Organization\ResponsibilityController::class, 'soft_delete']);
    Route::post('/destroy', [App\Http\Controllers\Organization\ResponsibilityController::class, 'destroy']);
    Route::post('/restore', [App\Http\Controllers\Organization\ResponsibilityController::class, 'restore']);
    Route::post('/bulk_import', [App\Http\Controllers\Organization\ResponsibilityController::class, 'bulk_import']);
});
