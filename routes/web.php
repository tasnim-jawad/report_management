<?php

use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/modal', function () {
    return view('modal');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
    Route::get('report-upload', 'WardController@report_upload');
    Route::get('submitted-units-data-add', 'WardController@submitted_units_data_add');
});

Route::group(['prefix' => 'thana', 'namespace' => '\App\Http\Controllers\thana'], function () {
    Route::get('report', 'ThanaController@report');
});


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

Route::any('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
