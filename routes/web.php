<?php

use App\Http\Middleware\IsAuth;
use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return redirect()->to('/login');
});
Route::get('/modal', function () {
    dd("ok");
    return view('modal');
});

Route::get('/login', function () {
    return view('auth.login');
})->middleware(IsAuth::class);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'dashboard', 'namespace' => '\App\Http\Controllers\Dashboard'], function () {
    Route::get('unit', 'DashboardController@unit');
    Route::get('ward', 'DashboardController@ward');
    Route::get('admin', 'DashboardController@admin');
});

Route::group(['prefix' => 'unit', 'namespace' => '\App\Http\Controllers\Unit'], function () {
    Route::get('report', 'UnitController@report');
    Route::get('report/upload', 'UnitController@report_upload');
});

Route::group(['prefix' => 'ward', 'namespace' => '\App\Http\Controllers\Ward'], function () {
    Route::get('report', 'WardController@report');
    // Route::get('report-upload', 'WardController@report_upload');
    Route::get('submitted-units-data-add', 'WardController@submitted_units_data_add');
    //WardReportStatusController
    Route::get('unit/report-check', 'WardReportStatusController@report_check');  //for see unit report from ward dashboard
    Route::get('unit/total-unit-report', 'WardTotalUnitSubmittedDataController@total_unit_report');  //for see unit report from ward dashboard
});

Route::group(['prefix' => 'thana', 'namespace' => '\App\Http\Controllers\thana'], function () {
    Route::get('report', 'ThanaController@report');
});

Route::group(['namespace' => 'App\Http\Controllers\Auth', 'middleware' => 'guest'], function(){
    Route::group(['prefix' => '/user'] , function(){
        Route::post('/login', 'LoginController@login');
    });
});
Route::any('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Route::get('/t', function(){
//     $user = User::where('role',6)->first();

//     $token = $user->createToken('access_token')->accessToken;
//     echo "<script>localStorage.token = `$token`</script>";
//     dd($token);
// });

Route::get('/tt', function () {
    $rs = auth_user_unit_responsibilities_info(request()->user_id);
    $hi = unit_report_header_info($rs, null, '2024-03-01');
    $cg = common_get(Dawat1RegularGroupWise::class, request()->user_id);
});


