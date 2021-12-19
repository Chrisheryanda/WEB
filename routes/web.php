<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliKelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DokumenController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('dashboard');
})->name('dashboard');

Route::prefix('data')->group(function () {
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('data.siswa');
        Route::post('/store', [SiswaController::class, 'store'])->name('data.siswa.store');
        Route::post('/update/{id}', [SiswaController::class, 'update'])->name('data.siswa.update');
        Route::get('/destroy/{id}', [SiswaController::class, 'destroy'])->name('data.siswa.destroy');
    });
    Route::prefix('wali_kelas')->group(function () {
        Route::get('/', [WaliKelasController::class, 'index'])->name('data.wali_kelas');
        Route::post('/store', [WaliKelasController::class, 'store'])->name('data.wali_kelas.store');
        Route::post('/update/{id}', [WaliKelasController::class, 'update'])->name('data.wali_kelas.update');
        Route::get('/destroy/{id}', [WaliKelasController::class, 'destroy'])->name('data.wali_kelas.destroy');
    });
    Route::prefix('jurusan')->group(function () {
        Route::get('/', [JurusanController::class, 'index'])->name('data.jurusan');
        Route::post('/store', [JurusanController::class, 'store'])->name('data.jurusan.store');
        Route::post('/update/{id}', [JurusanController::class, 'update'])->name('data.jurusan.update');
        Route::get('/destroy/{id}', [JurusanController::class, 'destroy'])->name('data.jurusan.destroy');
    });
    Route::prefix('kelas')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('data.kelas');
        Route::post('/store', [KelasController::class, 'store'])->name('data.kelas.store');
        Route::post('/update/{id}', [KelasController::class, 'update'])->name('data.kelas.update');
        Route::get('/destroy/{id}', [KelasController::class, 'destroy'])->name('data.kelas.destroy');
    });

    Route::prefix('dokumen')->group(function () {
        Route::get('/', [DokumenController::class, 'index'])->name('dokumen');
        Route::post('/store', [DokumenController::class, 'store'])->name('dokumen.store');
        Route::post('/update/{id}', [DokumenController::class, 'update'])->name('dokumen.update');
        Route::get('/destroy/{id}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');
        Route::get('/get/{file}', [DokumenController::class, 'getFile'])->name('dokumen.get');
    });
});
