<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StatusChack;



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
