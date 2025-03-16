<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\StatusChack;





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
