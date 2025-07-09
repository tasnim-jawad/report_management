<?php


use App\Http\Middleware\ThanaStatusChack;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| auth api
|--------------------------------------------------------------------------
|
*/


require_once __DIR__ . '/api/auth.php';


Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    /*
|--------------------------------------------------------------------------
| global api
|--------------------------------------------------------------------------
|
*/
    require_once __DIR__ . '/api/user.php';
    require_once __DIR__ . '/api/org.php';
    require_once __DIR__ . '/api/report.php';
    require_once __DIR__ . '/api/program/program.php';
    require_once __DIR__ . '/api/common/common.php';
    /*
|--------------------------------------------------------------------------
| unit api
|--------------------------------------------------------------------------
|
*/
    require_once __DIR__ . '/api/unit/dawat.php';
    require_once __DIR__ . '/api/unit/department.php';
    require_once __DIR__ . '/api/unit/songothon.php';
    require_once __DIR__ . '/api/unit/somajsheba.php';
    require_once __DIR__ . '/api/unit/bm.php';
    // require_once __DIR__ . '/api/unit/program.php';
    require_once __DIR__ . '/api/unit/others.php';
    require_once __DIR__ . '/api/unit/unit_user.php';

    /*
|--------------------------------------------------------------------------
| ward api
|--------------------------------------------------------------------------
|
*/
    require_once __DIR__ . '/api/ward/ward.php';

    /*
|--------------------------------------------------------------------------
| thana api
|--------------------------------------------------------------------------
|*/

    require_once __DIR__ . '/api/thana/thana.php';
    // require_once __DIR__ . '/api/thana/thana.php';
});


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// require_once __DIR__ . '/../app/Modules/Routes/ApiRoutes.php';
