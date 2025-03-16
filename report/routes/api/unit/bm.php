<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\StatusChack;

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
