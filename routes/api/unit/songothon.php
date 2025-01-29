<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StatusChack;

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
