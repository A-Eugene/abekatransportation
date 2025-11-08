<?php

use App\Http\Controllers\InformasiUmumController;
use App\Http\Controllers\JangkauanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JangkauanController::class, 'beranda']);

Route::get('/tarif', [LayananController::class, 'tarif']);

Route::get('/profil-perusahaan', [InformasiUmumController::class, 'profilPerusahaan']);

Route::get('/informasi-umum/{kategori?}', [InformasiUmumController::class, 'informasiUmum']);

Route::get('/login', [UserController::class, 'loginPage']);
Route::post('/login', [UserController::class, 'loginHandler']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

