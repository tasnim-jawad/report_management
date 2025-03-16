<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\WardStatusChack;

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
