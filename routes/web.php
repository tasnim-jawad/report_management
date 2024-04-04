<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'dashboard' , 'namespace' =>'\App\Http\Controllers\Dashboard' ],function(){
    Route::get('unit','DashboardController@unit');
});


Route::get('/t', function(){
    $user = User::where('role',6)->first();

    $token = $user->createToken('access_token')->accessToken;
    echo "<script>localStorage.token = `$token`</script>";
    dd($token);
});
