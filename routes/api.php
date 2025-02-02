<?php

use App\Http\Middleware\StatusChack;
use App\Http\Middleware\ThanaStatusChack;
use App\Http\Middleware\WardStatusChack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Auth', 'middleware' => 'guest:api'], function () {
    Route::group(['prefix' => '/user'], function () {
        Route::post('/login', 'LoginController@login');
    });
});

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::get('user/check_user', [App\Http\Controllers\Auth\LoginController::class, 'check_user']);
    // Route::post('/api-logout', [App\Http\Controllers\Auth\LoginController::class,'api_logout']);
});


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::group(['prefix' => '/user'], function () {
        Route::get('/user_info', [App\Http\Controllers\User\UserController::class, 'user_info']);
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











    Route::group(['prefix' => 'dawat1-regular-group-wise'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'dawat2-personal-and-target'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'dawat3-general-program-and-others'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'dawat4-gono-songjog-and-dawat-ovijan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'dawat5-jonoshadharon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Dawat\Dawat5JonoshadharonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Dawat\Dawat5JonoshadharonController::class, 'store_single'])->middleware(StatusChack::class);

        // Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'all']);
        // Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'show']);
        // Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'store']);
        // Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'update']);
        // Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'soft_delete']);
        // Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'destroy']);
        // Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'restore']);
        // Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class, 'bulk_import']);
    });









    Route::group(['prefix' => 'department1-talimul-quran'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department2-moholla-vittik-dawat'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department3-jubo-somaj-dawat'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department4-different-job-holders-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department5-paribarik-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department6-mosjid-dawah-infomation-center'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department7-dawat-in-technology'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'department8-dawat-in-cultural-program'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class, 'bulk_import']);
    });











    Route::group(['prefix' => 'dawah-and-prokashona'], function () {
        Route::get('/data', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class, 'bulk_import']);
    });



    Route::group(['prefix' => 'kormosuci-bastobayon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class, 'bulk_import']);
    });














    Route::group(['prefix' => 'songothon1-jonosokti'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon2-associate-member'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon3-departmental-information'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon4-unit-songothon'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon5-dawat-and-paribarik-unit'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon6-bidayi-students-connect'], function () {
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon7-sofor'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon8-iyanot-data'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'songothon9-sangothonik-boithok'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class, 'bulk_import']);
    });













    Route::group(['prefix' => 'proshikkhon1-tarbiat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Proshikkhon\Proshikkhon1TarbiatController::class, 'bulk_import']);
    });













    Route::group(['prefix' => 'shomajsheba1-personal-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba1PersonalSocialWorkController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'shomajsheba2-unit-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Shomajsheba\Shomajsheba2UnitSocialWorkController::class, 'bulk_import']);
    });









    Route::group(['prefix' => 'rastrio1-bishishto-bekti'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Rastrio\Rastrio1BishishtoBektiController::class, 'bulk_import']);
    });







    Route::group(['prefix' => 'bm-expense-category'], function () {
        Route::get('', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'index']);
        Route::get('/parent-category', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'parent_category']);

        Route::get('/all', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Expense\BmExpenseCategoryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'bm-expense'], function () {
        Route::get('/single-unit', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'single_unit']);
        Route::get('/bm-total-expense/{month}', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'bm_total_expense']);
        Route::get('/existing-data', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'existing_data']);

        Route::get('/all', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'store'])->middleware(StatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'update'])->middleware(StatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'soft_delete'])->middleware(StatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'destroy'])->middleware(StatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Expense\BmExpenseController::class, 'bulk_import']);
    });







    Route::group(['prefix' => 'unit-expense-target'], function () {
        Route::get('/ward-wise', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'ward_wise']);

        Route::get('/all', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Expense\UnitExpenseTargetController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'bm-category'], function () {
        Route::get('/parent-category', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'parent_category']);

        Route::get('/all', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Income\BmCategoryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'bm-category-user'], function () {
        Route::get('/single-unit', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'single_unit']);
        Route::get('/show_target/{user_id}/{bm_category_id}', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'show_target']);

        Route::get('/all', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Income\BmCategoryUserController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'bm-paid'], function () {
        Route::get('/single-unit', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'single_unit']);
        Route::get('/bm-paid-report/{user_id}/{bm_category_id}', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'bm_paid_report']);
        Route::get('/bm-total/{month}', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'bm_total']);
        Route::get('/existing-data', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'existing_data']);

        Route::get('/all', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'store'])->middleware(StatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'update'])->middleware(StatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'soft_delete'])->middleware(StatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'destroy'])->middleware(StatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Income\BmPaidController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'montobbo'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'store_single'])->middleware(StatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Montobbo\MontobboController::class, 'bulk_import']);
    });


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

    Route::group(['prefix' => 'bm-user-entry'], function () {
        Route::get('/all', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'store']);  //->middleware(StatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'update']);  //->middleware(StatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'soft_delete']);  //->middleware(StatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'destroy']);  //->middleware(StatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Income\BmUserEntryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'unit-shudhi'], function () {
        Route::get('/show-unit-shudhi', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'show_unit_shudhi']);

        Route::get('/all-unit-shudhi', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'all_unit_shudhi']);
        Route::get('/show/{id}', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'store']);  
        Route::post('/update', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'update']);  
        Route::post('/soft_delete', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'soft_delete']);  
        Route::post('/destroy', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'destroy']);  
        Route::post('/restore', [App\Http\Controllers\Shudhi\UnitShudhiController::class, 'restore']);
    });

    Route::group(['prefix' => 'unit-shudhi-entry'], function () {
        Route::get('/all', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'all']);
        Route::get('/month-wise-entry-show', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'month_wise_entry_show']);

        Route::get('/all', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'store']);  //->middleware(StatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'update']);  //->middleware(StatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'soft_delete']);  //->middleware(StatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'destroy']);  //->middleware(StatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Income\UnitShudhiEntryController::class, 'bulk_import']);
    });


    Route::group(['prefix' => 'program'], function () {
        Route::get('/all-program', [App\Http\Controllers\Program\ProgramController::class, 'all_program']);

        Route::get('/all', [App\Http\Controllers\Program\ProgramController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Program\ProgramController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Program\ProgramController::class, 'store']); 
        Route::post('/update', [App\Http\Controllers\Program\ProgramController::class, 'update']); 
        Route::post('/soft_delete', [App\Http\Controllers\Program\ProgramController::class, 'soft_delete']); 
        Route::post('/destroy', [App\Http\Controllers\Program\ProgramController::class, 'destroy']); 
        Route::post('/restore', [App\Http\Controllers\Program\ProgramController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Program\ProgramController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'program-delegate'], function () {
        Route::get('/program-wise-delegate', [App\Http\Controllers\Program\ProgramDelegateController::class, 'program_wise_delegate']);

        Route::get('/all', [App\Http\Controllers\Program\ProgramDelegateController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Program\ProgramDelegateController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Program\ProgramDelegateController::class, 'store']); 
        Route::post('/update', [App\Http\Controllers\Program\ProgramDelegateController::class, 'update']); 
        Route::post('/soft_delete', [App\Http\Controllers\Program\ProgramDelegateController::class, 'soft_delete']); 
        Route::post('/destroy', [App\Http\Controllers\Program\ProgramDelegateController::class, 'destroy']); 
        Route::post('/restore', [App\Http\Controllers\Program\ProgramDelegateController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Program\ProgramDelegateController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'program-schedule'], function () {
        Route::get('/unit-wise-schedule', [App\Http\Controllers\Program\ProgramScheduleController::class, 'unit_wise_schedule']);
        Route::get('/is-schedule-check', [App\Http\Controllers\Program\ProgramScheduleController::class, 'is_schedule_check']);

        Route::get('/all', [App\Http\Controllers\Program\ProgramScheduleController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Program\ProgramScheduleController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Program\ProgramScheduleController::class, 'store']); 
        Route::post('/update', [App\Http\Controllers\Program\ProgramScheduleController::class, 'update']); 
        Route::post('/soft_delete', [App\Http\Controllers\Program\ProgramScheduleController::class, 'soft_delete']); 
        Route::post('/destroy', [App\Http\Controllers\Program\ProgramScheduleController::class, 'destroy']); 
        Route::post('/restore', [App\Http\Controllers\Program\ProgramScheduleController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Program\ProgramScheduleController::class, 'bulk_import']);
    });



    //**-----------------------------------------------------------**/
    //**-----------------------------------------------------------**/
    //**--------------------------- Ward API ----------------------**/
    //**-----------------------------------------------------------**/
    //**-----------------------------------------------------------**/
    Route::group(['prefix' => 'ward/user'], function () {
        Route::get('/show', [App\Http\Controllers\Ward\WardUserController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Ward\WardUserController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Ward\WardUserController::class, 'update']);
        Route::post('/destroy', [App\Http\Controllers\Ward\WardUserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'ward/unit'], function () {
        Route::get('/all', [App\Http\Controllers\Ward\WardUnitController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Ward\WardUnitController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Ward\WardUnitController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Ward\WardUnitController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Ward\WardUnitController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Ward\WardUnitController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Ward\WardUnitController::class, 'restore']);
    });
    Route::group(['prefix' => 'ward/unit'], function () {
        Route::get('/report-status', [App\Http\Controllers\Ward\WardReportStatusController::class, 'report_status']);
        Route::post('/change-status', [App\Http\Controllers\Ward\WardReportStatusController::class, 'change_status']);
        Route::post('/report-status-single-unit', [App\Http\Controllers\Ward\WardReportStatusController::class, 'report_status_single_unit']);
    });

    Route::group(['prefix' => 'ward/unit-jonoshokti'], function () {
        Route::post('/set-responsibility', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'set_responsibility']);

        Route::get('/all', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Ward\WardUnitJonoshoktiController::class, 'restore']);
    });

    Route::group(['prefix' => 'ward-dawat5-jonoshadharon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Dawat\WardDawat5JonoshadharonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Dawat\WardDawat5JonoshadharonController::class, 'store_single'])->middleware(WardStatusChack::class);

        // Route::get('/all', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'all']);
        // Route::get('/show/{id}', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'show']);
        // Route::post('/store', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'store']);
        // Route::post('/update', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'update']);
        // Route::post('/soft_delete', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'soft_delete']);
        // Route::post('/destroy', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'destroy']);
        // Route::post('/restore', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'restore']);
        // Route::post('/bulk_import', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-dawat1-regular-group-wise'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'store_single'])->middleware(WardStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Ward\Dawat\WardDawat1RegularGroupWiseController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-dawat2-personal-and-target'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'store_single'])->middleware(WardStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Ward\Dawat\WardDawat2PersonalAndTargetController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-dawat3-general-program-and-others'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'store_single'])->middleware(WardStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthersController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-dawat4-gono-songjog-and-dawat-ovijan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'store_single'])->middleware(WardStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijanController::class, 'bulk_import']);
    });





    Route::group(['prefix' => 'ward-department1-talimul-quran'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'store_single'])->middleware(WardStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Ward\Department\WardDepartment1TalimulQuranController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-department2-moholla-vittik-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment2MohollaVittikDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment2MohollaVittikDawatController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-department3-jubo-somaj-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment3JuboSomajDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment3JuboSomajDawatController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-department4-different-job-holders-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment4DifferentJobHoldersDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment4DifferentJobHoldersDawatController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-department5-paribarik-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment5ParibarikDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment5ParibarikDawatController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-department6-mosjid-dawah-infomation-centers'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment6MosjidDawahInfomationCenterController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment6MosjidDawahInfomationCenterController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-department7-dawat-in-technology'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Department\WardDepartment7DawatInTechnologyController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Department\WardDepartment7DawatInTechnologyController::class, 'store_single'])->middleware(WardStatusChack::class);
    });





    Route::group(['prefix' => 'ward-dawah-and-prokashona'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\DawahAndProkashona\WardDawahAndProkashonaController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\DawahAndProkashona\WardDawahAndProkashonaController::class, 'store_single'])->middleware(WardStatusChack::class);
    });




    Route::group(['prefix' => 'ward-kormosuci-bastobayon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Kormosuci\WardKormosuciBastobayonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Kormosuci\WardKormosuciBastobayonController::class, 'store_single'])->middleware(WardStatusChack::class);
    });



    Route::group(['prefix' => 'ward-songothon1-jonosokti'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon1JonosoktiController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon1JonosoktiController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon2-associate-member'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon2AssociateMemberController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon2AssociateMemberController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon3-departmental-information'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon3DepartmentalInformationController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon3DepartmentalInformationController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon4-unit-songothon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon4UnitSongothonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon4UnitSongothonController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon5-dawat-and-paribarik-unit'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon5DawatAndParibarikUnitController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon5DawatAndParibarikUnitController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon6-bidayi-students-connect'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon6BidayiStudentsConnectController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon6BidayiStudentsConnectController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon7-sofor'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon7SoforController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon7SoforController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon8-iyanot-data'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon8IyanotDataController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon8IyanotDataController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-songothon9-sangothonik-boithok'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon9SangothonikBoithokController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Songothon\WardSongothon9SangothonikBoithokController::class, 'store_single'])->middleware(WardStatusChack::class);
    });






    Route::group(['prefix' => 'ward-proshikkhon1-tarbiat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Proshikkhon\WardProshikkhon1TarbiatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Proshikkhon\WardProshikkhon1TarbiatController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-proshikkhon2-manob-shompod-unnoyon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Proshikkhon\WardProshikkhon2ManobShompodUnnoyonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Proshikkhon\WardProshikkhon2ManobShompodUnnoyonController::class, 'store_single'])->middleware(WardStatusChack::class);
    });




    Route::group(['prefix' => 'ward-shomajsheba1-personal-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba1PersonalSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba1PersonalSocialWorkController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-shomajsheba2-group-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba2GroupSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba2GroupSocialWorkController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-shomajsheba3-health-and-family-kollan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba3HealthAndFamilyKollanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba3HealthAndFamilyKollanController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-shomajsheba4-institutional-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba4InstitutionalSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Shomajsheba\WardShomajsheba4InstitutionalSocialWorkController::class, 'store_single'])->middleware(WardStatusChack::class);
    });





    Route::group(['prefix' => 'ward-rastrio1-political-communication'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio1PoliticalCommunicationController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio1PoliticalCommunicationController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-rastrio2-kormoshuchi-bastobayon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio2KormoshuchiBastobayonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio2KormoshuchiBastobayonController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-rastrio3-dibosh-palon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio3DiboshPalonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio3DiboshPalonController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-rastrio4-election-activitie'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio4ElectionActivityController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Rastrio\WardRastrio4ElectionActivityController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-montobbo'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Ward\Montobbo\WardMontobboController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Ward\Montobbo\WardMontobboController::class, 'store_single'])->middleware(WardStatusChack::class);
    });


    Route::group(['prefix' => 'ward-bm-expense-category'], function () {
        Route::get('', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'index']);
        Route::get('/parent-category', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'parent_category']);

        Route::get('/all', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseCategoryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-bm-expense'], function () {
        Route::get('/single-ward', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'single_ward']);
        Route::get('/bm-total-expense/{month}', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'bm_total_expense']);
        Route::get('/existing-data', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'existing_data']);

        Route::get('/all', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'store'])->middleware(WardStatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'update'])->middleware(WardStatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'soft_delete'])->middleware(WardStatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'destroy'])->middleware(WardStatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'restore'])->middleware(WardStatusChack::class);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Ward\Expense\WardBmExpenseController::class, 'bulk_import'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward-bm-income-category'], function () {
        Route::get('/parent-category', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'parent_category']);


        Route::get('/all', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeCategoryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'ward-bm-income'], function () {
        Route::get('/single-ward', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'single_ward']);
        Route::get('/bm-income-report/{user_id}/{ward_bm_income_category_id}', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'bm_income_report']);
        Route::get('/bm-total/{month}', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'bm_income_total']);
        Route::get('/existing-data', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'existing_data']);

        Route::get('/all', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'store'])->middleware(WardStatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'update'])->middleware(WardStatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'soft_delete'])->middleware(WardStatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'destroy'])->middleware(WardStatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'restore'])->middleware(WardStatusChack::class);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Ward\Income\WardBmIncomeController::class, 'bulk_import'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'ward'], function () {
        Route::get('/uploaded-data', [App\Http\Controllers\Ward\WardController::class, 'report_upload_api']);
        Route::get('/income-category-wise', [App\Http\Controllers\Ward\WardController::class, 'income_category_wise']);
        Route::get('/expense-category-wise', [App\Http\Controllers\Ward\WardController::class, 'expense_category_wise']);

        Route::get('/check-report-info', [App\Http\Controllers\Ward\WardController::class, 'check_report_info']);
        Route::get('/check-report-info-in-range', [App\Http\Controllers\Ward\WardController::class, 'check_report_info_in_range']);
        Route::get('/uploaded-data-monthly', [App\Http\Controllers\Ward\WardController::class, 'report_upload_monthly']);
        Route::get('/report-status', [App\Http\Controllers\Ward\WardController::class, 'report_status']);
        Route::get('/report-joma', [App\Http\Controllers\Ward\WardController::class, 'report_joma']);
    });

    Route::group(['prefix' => 'ward'], function () {
        Route::post('/submitted-units-data-add', [App\Http\Controllers\Ward\WardTotalUnitSubmittedDataController::class, 'submitted_units_data_add'])->middleware(WardStatusChack::class);
        Route::get('/get-all-unit-data', [App\Http\Controllers\Ward\WardTotalUnitSubmittedDataController::class, 'get_all_unit_data']);
        Route::get('/count-approved-unit', [App\Http\Controllers\Ward\WardTotalUnitSubmittedDataController::class, 'count_approved_unit']);
    });

    Route::group(['prefix' => 'ward'], function () {
        Route::post('/unit-report-joma-permitted-month', [App\Http\Controllers\Ward\PermissionController::class, 'unit_report_joma_permitted_month']);
        Route::post('/set-unit-report-joma-permission', [App\Http\Controllers\Ward\PermissionController::class, 'set_unit_report_joma_permission']);
        Route::post('/remove-unit-report-joma-permission', [App\Http\Controllers\Ward\PermissionController::class, 'remove_unit_report_joma_permission']);
        // Route::post('/toggle-dashboard-permission', [App\Http\Controllers\Ward\PermissionController::class,'toggle_dashboard_permission']);
    });


    Route::group(['prefix' => 'comment'], function () {
        Route::get('/parent-category', [App\Http\Controllers\Comment\CommentController::class, 'parent_category']);
        Route::get('/index', [App\Http\Controllers\Comment\CommentController::class, 'index']);
        Route::get('/column-comment-all', [App\Http\Controllers\Comment\CommentController::class, 'column_comment_all']);
        Route::get('/count-comment', [App\Http\Controllers\Comment\CommentController::class, 'count_comment']);

        Route::get('/all', [App\Http\Controllers\Comment\CommentController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Comment\CommentController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Comment\CommentController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Comment\CommentController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Comment\CommentController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Comment\CommentController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Comment\CommentController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Comment\CommentController::class, 'bulk_import']);
    });



    //**-----------------------------------------------------------**/
    //**-----------------------------------------------------------**/
    //**--------------------------- Thana API ----------------------**/
    //**-----------------------------------------------------------**/
    //**-----------------------------------------------------------**/

    Route::group(['prefix' => 'thana/ward'], function () {
        Route::get('/report-status', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'report_status']);
        Route::post('/change-status', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'change_status']);
    });

    Route::group(['prefix' => 'thana'], function () {
        // Route::get('/uploaded-data', [App\Http\Controllers\Thana\ThanaController::class, 'report_upload_api']);
        // Route::get('/income-category-wise', [App\Http\Controllers\Thana\ThanaController::class, 'income_category_wise']);
        // Route::get('/expense-category-wise', [App\Http\Controllers\Thana\ThanaController::class, 'expense_category_wise']);

        // Route::get('/check-report-info', [App\Http\Controllers\Thana\ThanaController::class, 'check_report_info']);
        // Route::get('/check-report-info-in-range', [App\Http\Controllers\Thana\ThanaController::class, 'check_report_info_in_range']);
        // Route::get('/uploaded-data-monthly', [App\Http\Controllers\Thana\ThanaController::class, 'report_upload_monthly']);
        Route::get('/report-status', [App\Http\Controllers\Thana\ThanaController::class, 'report_status']);
        // Route::get('/report-joma', [App\Http\Controllers\Thana\ThanaController::class, 'report_joma']);
    });

    Route::group(['prefix' => 'thana'], function () {
        Route::post('/ward-report-joma-permitted-month', [App\Http\Controllers\Thana\PermissionController::class, 'ward_report_joma_permitted_month']);
        Route::post('/set-ward-report-joma-permission', [App\Http\Controllers\Thana\PermissionController::class, 'set_ward_report_joma_permission']);
        Route::post('/remove-ward-report-joma-permission', [App\Http\Controllers\Thana\PermissionController::class, 'remove_ward_report_joma_permission']);
    });

    Route::group(['prefix' => 'thana/user'], function () {
        Route::get('/show', [App\Http\Controllers\Thana\ThanaUserController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaUserController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaUserController::class, 'update']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaUserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'thana/ward'], function () {
        Route::get('/all', [App\Http\Controllers\Thana\ThanaWardController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Thana\ThanaWardController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaWardController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaWardController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Thana\ThanaWardController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaWardController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Thana\ThanaWardController::class, 'restore']);
    });

    Route::group(['prefix' => 'thana/ward-jonoshokti'], function () {
        Route::post('/set-responsibility', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'set_responsibility']);

        Route::get('/all', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'restore']);
    });

    Route::group(['prefix' => 'ward-expense-target'], function () {
        Route::get('/thana-wise', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'thana_wise']);

        Route::get('/all', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'bulk_import']);
    });




    Route::group(['prefix' => 'thana-dawat1-regular-group-wise'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat2-personal-and-target'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat3-general-program-and-others'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat4-gono-songjog-and-dawat-ovijan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat5-jonoshadharon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat5JonoshadharonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat5JonoshadharonController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
});


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

require_once __DIR__ . '/../app/Modules/Routes/ApiRoutes.php';