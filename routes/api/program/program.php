<?php

use Illuminate\Support\Facades\Route;



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
    Route::get('/org-type-wise-schedule', [App\Http\Controllers\Program\ProgramScheduleController::class, 'org_type_wise_schedule']);
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
