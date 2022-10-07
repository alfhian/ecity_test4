<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ApiKaryawanController;
use App\Http\Controllers\API\ApiJabatanController;
use App\Http\Controllers\API\ApiLevelController;
use App\Http\Controllers\API\ApiDepartmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('karyawan')->group(function () {
    Route::get('/', [ApiKaryawanController::class, 'index']);
    Route::post('/add', [ApiKaryawanController::class, 'add']);
    Route::put('/edit', [ApiKaryawanController::class, 'edit']);
    Route::delete('/delete', [ApiKaryawanController::class, 'delete']);
});
Route::prefix('jabatan')->group(function () {
    Route::get('/', [ApiJabatanController::class, 'index']);
    Route::post('/add', [ApiJabatanController::class, 'add']);
    Route::put('/edit', [ApiJabatanController::class, 'edit']);
    Route::delete('/delete', [ApiJabatanController::class, 'delete']);
});
Route::prefix('level')->group(function () {
    Route::get('/', [ApiLevelController::class, 'index']);
    Route::post('/add', [ApiLevelController::class, 'add']);
    Route::put('/edit', [ApiLevelController::class, 'edit']);
    Route::delete('/delete', [ApiLevelController::class, 'delete']);
});
Route::prefix('department')->group(function () {
    Route::get('/', [ApiDepartmentController::class, 'index']);
    Route::post('/add', [ApiDepartmentController::class, 'add']);
    Route::put('/edit', [ApiDepartmentController::class, 'edit']);
    Route::delete('/delete', [ApiDepartmentController::class, 'delete']);
});