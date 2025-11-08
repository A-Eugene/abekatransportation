<?php

use App\Http\Controllers\InformasiUmumController;
use App\Http\Controllers\JangkauanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JangkauanController::class, 'beranda'])->name('beranda');

Route::get('/tarif', [LayananController::class, 'tarif'])->name('tarif');

Route::get('/profil-perusahaan', [InformasiUmumController::class, 'profilPerusahaan'])->name('profil-perusahaan');

Route::get('/informasi-umum/{kategori?}', [InformasiUmumController::class, 'informasiUmum'])->name('informasi-umum');

Route::get('/login', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'loginHandler'])->name('login-handler');
Route::post('/logout', [UserController::class, 'logoutHandler'])->name('logout-handler');

// DEBUG
Route::get('/logout', [UserController::class, 'logoutHandler']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/{model?}', [UserController::class, 'userDashboardPage'])->name('dashboard');
});

