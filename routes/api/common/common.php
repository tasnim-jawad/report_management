<?php

use Illuminate\Support\Facades\Route;


Route::get('/gender', [App\Http\Controllers\Program\ProgramController::class, 'gender']);



// Route::group(['prefix' => 'program-schedule'], function () {
//     Route::get('/org-type-wise-schedule', [App\Http\Controllers\Program\ProgramScheduleController::class, 'org_type_wise_schedule']);
//     Route::get('/is-schedule-check', [App\Http\Controllers\Program\ProgramScheduleController::class, 'is_schedule_check']);

//     Route::get('/all', [App\Http\Controllers\Program\ProgramScheduleController::class, 'all']);
//     Route::get('/show/{id}', [App\Http\Controllers\Program\ProgramScheduleController::class, 'show']);
//     Route::post('/store', [App\Http\Controllers\Program\ProgramScheduleController::class, 'store']);
//     Route::post('/update', [App\Http\Controllers\Program\ProgramScheduleController::class, 'update']);
//     Route::post('/soft_delete', [App\Http\Controllers\Program\ProgramScheduleController::class, 'soft_delete']);
//     Route::post('/destroy', [App\Http\Controllers\Program\ProgramScheduleController::class, 'destroy']);
//     Route::post('/restore', [App\Http\Controllers\Program\ProgramScheduleController::class, 'restore']);
//     Route::post('/bulk_import', [App\Http\Controllers\Program\ProgramScheduleController::class, 'bulk_import']);
// });
