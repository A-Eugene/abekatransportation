<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'beranda']);

Route::get('/tarif', [LandingController::class, 'tarif']);

Route::get('/profil-perusahaan', [LandingController::class, 'profilPerusahaan']);

Route::get('/informasi-umum/{kategori?}', [LandingController::class, 'informasiUmum'])->name('informasiUmum');

