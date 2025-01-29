   <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Middleware\ThanaStatusChack;
    use App\Http\Middleware\WardStatusChack;

    Route::group(['prefix' => 'thana/ward'], function () {
        Route::get('/report-status', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'report_status']);
        Route::post('/change-status', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'change_status']);
    });

    Route::group(['prefix' => 'thana'], function () {
        // Route::get('/uploaded-data', [App\Http\Controllers\Thana\ThanaController::class, 'report_upload_api']);
        // Route::get('/income-category-wise', [App\Http\Controllers\Thana\ThanaController::class, 'income_category_wise']);
        // Route::get('/expense-category-wise', [App\Http\Controllers\Thana\ThanaController::class, 'expense_category_wise']);

        // Route::get('/check-report-info', [App\Http\Controllers\Thana\ThanaController::class, 'check_report_info']);
        // Route::get('/check-report-info-in-range', [App\Http\Controllers\Thana\ThanaController::class, 'check_report_info_in_range']);
        // Route::get('/uploaded-data-monthly', [App\Http\Controllers\Thana\ThanaController::class, 'report_upload_monthly']);
        Route::get('/report-status', [App\Http\Controllers\Thana\ThanaController::class, 'report_status']);
        // Route::get('/report-joma', [App\Http\Controllers\Thana\ThanaController::class, 'report_joma']);
    });

    Route::group(['prefix' => 'thana'], function () {
        Route::post('/ward-report-joma-permitted-month', [App\Http\Controllers\Thana\PermissionController::class, 'ward_report_joma_permitted_month']);
        Route::post('/set-ward-report-joma-permission', [App\Http\Controllers\Thana\PermissionController::class, 'set_ward_report_joma_permission']);
        Route::post('/remove-ward-report-joma-permission', [App\Http\Controllers\Thana\PermissionController::class, 'remove_ward_report_joma_permission']);
    });

    Route::group(['prefix' => 'thana/user'], function () {
        Route::get('/show', [App\Http\Controllers\Thana\ThanaUserController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaUserController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaUserController::class, 'update']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaUserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'thana/ward'], function () {
        Route::get('/all', [App\Http\Controllers\Thana\ThanaWardController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Thana\ThanaWardController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaWardController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaWardController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Thana\ThanaWardController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaWardController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Thana\ThanaWardController::class, 'restore']);
    });

    Route::group(['prefix' => 'thana/ward-jonoshokti'], function () {
        Route::post('/set-responsibility', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'set_responsibility']);

        Route::get('/all', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'restore']);
    });

    Route::group(['prefix' => 'ward-expense-target'], function () {
        Route::get('/thana-wise', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'thana_wise']);

        Route::get('/all', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Ward\Expense\WardExpenseTargetController::class, 'bulk_import']);
    });




    Route::group(['prefix' => 'thana-dawat1-regular-group-wise'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat2-personal-and-target'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat3-general-program-and-others'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat4-gono-songjog-and-dawat-ovijan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'store_single'])->middleware(WardStatusChack::class);
    });

    Route::group(['prefix' => 'thana-dawat5-jonoshadharon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat5JonoshadharonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat5JonoshadharonController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
