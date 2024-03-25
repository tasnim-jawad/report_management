<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::group(['prefix' => 'v1'], function(){
    Route::group(['prefix' => '/user'] , function(){
        Route::get('/all', [App\Http\Controllers\User\UserController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\User\UserController::class,'show']);
        Route::post('/store', [App\Http\Controllers\User\UserController::class,'store']);
        Route::post('/update', [App\Http\Controllers\User\UserController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\User\UserController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\User\UserController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\User\UserController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\User\UserController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'user-role'] , function(){
        Route::get('/all', [App\Http\Controllers\User\UserRoleController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\User\UserRoleController::class,'show']);
        Route::post('/store', [App\Http\Controllers\User\UserRoleController::class,'store']);
        Route::post('/update', [App\Http\Controllers\User\UserRoleController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\User\UserRoleController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\User\UserRoleController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\User\UserRoleController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\User\UserRoleController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'user-class'] , function(){
        Route::get('/all', [App\Http\Controllers\User\UserClassController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\User\UserClassController::class,'show']);
        Route::post('/store', [App\Http\Controllers\User\UserClassController::class,'store']);
        Route::post('/update', [App\Http\Controllers\User\UserClassController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\User\UserClassController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\User\UserClassController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\User\UserClassController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\User\UserClassController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'user-contact'] , function(){
        Route::get('/all', [App\Http\Controllers\User\UserContactController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\User\UserContactController::class,'show']);
        Route::post('/store', [App\Http\Controllers\User\UserContactController::class,'store']);
        Route::post('/update', [App\Http\Controllers\User\UserContactController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\User\UserContactController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\User\UserContactController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\User\UserContactController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\User\UserContactController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'report-uploader'] , function(){
        Route::get('/all', [App\Http\Controllers\User\ReportUploaderController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\User\ReportUploaderController::class,'show']);
        Route::post('/store', [App\Http\Controllers\User\ReportUploaderController::class,'store']);
        Route::post('/update', [App\Http\Controllers\User\ReportUploaderController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\User\ReportUploaderController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\User\ReportUploaderController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\User\ReportUploaderController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\User\ReportUploaderController::class,'bulk_import']);
    });








    Route::group(['prefix' => 'org-area'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgAreaController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgAreaController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgAreaController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgAreaController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgAreaController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgAreaController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgAreaController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgAreaController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-type'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgTypeController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgTypeController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgTypeController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgTypeController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgTypeController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgTypeController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgTypeController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgTypeController::class,'bulk_import']);
    });









    Route::group(['prefix' => 'org-city'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgCityController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgCityController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgCityController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgCityController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgCityController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgCityController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgCityController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgCityController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-thana'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgThanaController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgThanaController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgThanaController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgThanaController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgThanaController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgThanaController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgThanaController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgThanaController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-ward'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgWardController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgWardController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgWardController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgWardController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgWardController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgWardController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgWardController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgWardController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-unit'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgUnitController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgUnitController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgUnitController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgUnitController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgUnitController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgUnitController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgUnitController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgUnitController::class,'bulk_import']);
    });









    Route::group(['prefix' => 'org-city-user'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgCityUserController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgCityUserController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgCityUserController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgCityUserController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgCityUserController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgCityUserController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgCityUserController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgCityUserController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-thana-user'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgThanaUserController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgThanaUserController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgThanaUserController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgThanaUserController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgThanaUserController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgThanaUserController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgThanaUserController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgThanaUserController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-ward-user'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgWardUserController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgWardUserController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgWardUserController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgWardUserController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgWardUserController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgWardUserController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgWardUserController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgWardUserController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'org-unit-user'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgUnitUserController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgUnitUserController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgUnitUserController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgUnitUserController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgUnitUserController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgUnitUserController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgUnitUserController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgUnitUserController::class,'bulk_import']);
    });









    Route::group(['prefix' => 'org-city-responsible'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgCityResponsibleController::class,'bulk_import']);
    });
    Route::group(['prefix' => 'org-thana-responsible'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgThanaResponsibleController::class,'bulk_import']);
    });
    Route::group(['prefix' => 'org-ward-responsible'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgWardResponsibleController::class,'bulk_import']);
    });
    Route::group(['prefix' => 'org-unit-responsible'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\OrgUnitResponsibleController::class,'bulk_import']);
    });








    Route::group(['prefix' => 'responsibility'] , function(){
        Route::get('/all', [App\Http\Controllers\Organization\ResponsibilityController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Organization\ResponsibilityController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Organization\ResponsibilityController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Organization\ResponsibilityController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Organization\ResponsibilityController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Organization\ResponsibilityController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Organization\ResponsibilityController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Organization\ResponsibilityController::class,'bulk_import']);
    });








    Route::group(['prefix' => 'report-info'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\ReportInfoController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\ReportInfoController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\ReportInfoController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\ReportInfoController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\ReportInfoController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\ReportInfoController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\ReportInfoController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\ReportInfoController::class,'bulk_import']);
    });









    Route::group(['prefix' => 'dawat1-regular-group-wise'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat1RegularGroupWiseController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'dawat2-personal-and-target'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat2PersonalAndTargetController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'dawat3-general-program-and-others'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat3GeneralProgramAndOthersController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'dawat4-gono-songjog-and-dawat-ovijan'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Dawat\Dawat4GonoSongjogAndDawatOvijanController::class,'bulk_import']);
    });









    Route::group(['prefix' => 'department1-talimul-quran'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department1TalimulQuranController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department2-moholla-vittik-dawat'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department2MohollaVittikDawatController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department3-jubo-somaj-dawat'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department3JuboSomajDawatController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department4-different-job-holders-dawat'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department4DifferentJobHoldersDawatController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department5-paribarik-dawat'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department5ParibarikDawatController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department6-mosjid-dawah-infomation-center'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department6MosjidDawahInfomationCenterController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department7-dawat-in-technology'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department7DawatInTechnologyController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'department8-dawat-in-cultural-program'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Department\Department8DawatInCulturalProgramController::class,'bulk_import']);
    });











    Route::group(['prefix' => 'dawah-and-prokashona'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\DawahAndProkashona\DawahAndProkashonaController::class,'bulk_import']);
    });



    Route::group(['prefix' => 'kormosuci-bastobayon'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Kormosuci\KormosuciBastobayonController::class,'bulk_import']);
    });














    Route::group(['prefix' => 'songothon1-jonosokti'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon1JonosoktiController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon2-associate-member'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon2AssociateMemberController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon3-departmental-information'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon3DepartmentalInformationController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon4-unit-songothon'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon4UnitSongothonController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon5-dawat-and-paribarik-unit'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon5DawatAndParibarikUnitController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon6-bidayi-students-connect'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon6BidayiStudentsConnectController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon7-sofor'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon7SoforController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon8-iyanot-data'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon8IyanotDataController::class,'bulk_import']);
    });

    Route::group(['prefix' => 'songothon9-sangothonik-boithok'] , function(){
        Route::get('/all', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'show']);
        Route::post('/store', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'store']);
        Route::post('/update', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Songothon\Songothon9SangothonikBoithokController::class,'bulk_import']);
    });


});


