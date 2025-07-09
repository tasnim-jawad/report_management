<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Unit\UnitUserController;


Route::prefix('unit-user')->group(function () {
    Route::get('', [UnitUserController::class,'index']);
    Route::get('{user_id}', [UnitUserController::class,'show']);
    Route::post('store', [UnitUserController::class,'store']);
    // Route::post('update/{slug}', [UnitUserController::class,'update']);
    // Route::post('update-status', [UnitUserController::class,'updateStatus']);
    // Route::post('soft-delete', [UnitUserController::class,'softDelete']);
    // Route::post('destroy/{slug}', [UnitUserController::class,'destroy']);
    // Route::post('restore', [UnitUserController::class,'restore']);
    // Route::post('import', [UnitUserController::class,'import']);
    // Route::post('bulk-action', [UnitUserController::class, 'bulkAction']);
});