<?php

use App\Http\Controllers\InformasiUmumController;
use App\Http\Controllers\JangkauanController;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JangkauanController::class, 'beranda']);

Route::get('/tarif', [LayananController::class, 'tarif']);

Route::get('/profil-perusahaan', [InformasiUmumController::class, 'profilPerusahaan']);

Route::get('/informasi-umum/{kategori?}', [InformasiUmumController::class, 'informasiUmum']);

