<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return redirect()->to('/login');
});
/*
|--------------------------------------------------------------------------
| frontend Routes
|--------------------------------------------------------------------------
|
*/
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/test.php';
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
require_once __DIR__ . '/backend/dashboard.php';
require_once __DIR__ . '/backend/thana.php';
require_once __DIR__ . '/backend/ward.php';
require_once __DIR__ . '/backend/unit.php';




Route::get('/db', function () {
    $databaseName = DB::getDatabaseName();

    $columns = DB::table('information_schema.columns')
        ->select('TABLE_NAME', 'COLUMN_NAME')
        ->where('TABLE_SCHEMA', $databaseName)
        ->orderBy('TABLE_NAME')
        ->orderBy('ORDINAL_POSITION')
        ->get();

    $grouped = [];

    foreach ($columns as $column) {
        $grouped[$column->TABLE_NAME][] = $column->COLUMN_NAME;
    }

    return response()->json($grouped);

});
