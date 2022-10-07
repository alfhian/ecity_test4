<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth', 'authorizationModules']], function () {
    Route::get('/home', [Dashboard::class, 'index'])->name('home');
    Route::prefix('karyawan')->group(function () {
        Route::get('/', [KaryawanController::class, 'index'])->name('karyawan');
        Route::get('/add', [KaryawanController::class, 'add'])->name('add_karyawan');
        Route::post('/add/save', [KaryawanController::class, 'save'])->name('save_karyawan');
        Route::get('/edit/{id}', [KaryawanController::class, 'edit'])->name('edit_karyawan');
        Route::post('/edit/save', [KaryawanController::class, 'save_edit'])->name('save_edit_karyawan');
        Route::get('/remove/validation/{id}', [Karyawan::class, 'validation_remove'])->name('validation_remove_karyawan');
        Route::get('/remove/{id}', [KaryawanController::class, 'remove'])->name('remove');
        Route::get('/submit/{id}', [KaryawanController::class, 'submit'])->name('submit');
    });
    Route::prefix('jabatan')->group(function () {
        Route::get('/', [JabatanController::class, 'index'])->name('jabatan');
        Route::get('/add', [JabatanController::class, 'add'])->name('add_jabatan');
        Route::post('/add/save', [JabatanController::class, 'save'])->name('save_jabatan');
        Route::get('/edit/{id}', [JabatanController::class, 'edit'])->name('edit_jabatan');
        Route::post('/edit/save', [JabatanController::class, 'save_edit'])->name('save_edit_jabatan');
        Route::get('/remove/validation/{id}', [Jabatan::class, 'validation_remove'])->name('validation_remove_jabatan');
        Route::get('/remove/{id}', [JabatanController::class, 'remove'])->name('remove');
        Route::get('/submit/{id}', [JabatanController::class, 'submit'])->name('submit');
    });
    Route::prefix('level')->group(function () {
        Route::get('/', [LevelController::class, 'index'])->name('level');
        Route::get('/add', [LevelController::class, 'add'])->name('add_level');
        Route::post('/add/save', [LevelController::class, 'save'])->name('save_level');
        Route::get('/edit/{id}', [LevelController::class, 'edit'])->name('edit_level');
        Route::post('/edit/save', [LevelController::class, 'save_edit'])->name('save_edit_level');
        Route::get('/remove/validation/{id}', [Level::class, 'validation_remove'])->name('validation_remove_level');
        Route::get('/remove/{id}', [LevelController::class, 'remove'])->name('remove');
        Route::get('/submit/{id}', [LevelController::class, 'submit'])->name('submit');
    });
    Route::prefix('department')->group(function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('department');
        Route::get('/add', [DepartmentController::class, 'add'])->name('add_department');
        Route::post('/add/save', [DepartmentController::class, 'save'])->name('save_department');
        Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('edit_department');
        Route::post('/edit/save', [DepartmentController::class, 'save_edit'])->name('save_edit_department');
        Route::get('/remove/validation/{id}', [DepartmentController::class, 'validation_remove'])->name('validation_remove_department');
        Route::get('/remove/{id}', [DepartmentController::class, 'remove'])->name('remove');
        Route::get('/submit/{id}', [DepartmentController::class, 'submit'])->name('submit');
    });
});

require __DIR__.'/auth.php';

