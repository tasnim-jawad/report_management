<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\StatusChack;


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
