<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'beranda']);

Route::get('/profil-perusahaan', [LandingController::class, 'profilPerusahaan']);

Route::get('/informasi', [LandingController::class, 'informasiPerusahaan']);

Route::get('/informasi-paket', [LandingController::class, 'informasiPaket']);

Route::get('/informasi-syaratketentuan', [LandingController::class, 'informasiSyaratKetentuan']);

