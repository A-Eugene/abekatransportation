<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'beranda']);

Route::get('/profil-perusahaan', [LandingController::class, 'profilPerusahaan']);

