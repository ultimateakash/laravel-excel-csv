<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',                             [MovieController::class, 'index']);

Route::post('/import',                      [MovieController::class, 'import']);
Route::post('/import-insert-update',        [MovieController::class, 'importInsertUpdate']);

Route::get('/export',                       [MovieController::class, 'export']);
Route::get('/export-custom-data',           [MovieController::class, 'exportCustomData']);
Route::get('/export-query-data',            [MovieController::class, 'exportQueryData']);
