<?php

use App\Http\Controllers\InformasiUmumController;
use App\Http\Controllers\JangkauanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriInformasiUmumController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'beranda'])->name('beranda');

Route::get('/tarif', [LandingController::class, 'tarif'])->name('tarif');

Route::get('/profil-perusahaan', [LandingController::class, 'profilPerusahaan'])->name('profil-perusahaan');

Route::get('/informasi-umum/{kategori?}', [LandingController::class, 'informasiUmum'])->name('informasi-umum');

Route::get('/login', [UserController::class, 'loginPage'])->name('login');
Route::post('/login', [UserController::class, 'loginHandler'])->name('login-handler');
Route::post('/logout', [UserController::class, 'logoutHandler'])->name('logout-handler');

Route::middleware('auth')->prefix('/dashboard')->group(function () {
    Route::get('/', function() {
        return redirect(route('dashboard-user'));
    })->name('dashboard');

    // User
    Route::get('/User', [UserController::class, 'dashboardPage'])->name('dashboard-user');
    Route::post('/User/create', [UserController::class, 'store'])->name('create-user');
    Route::post('/User/update', [UserController::class, 'update'])->name('update-user');
    Route::post('/User/delete', [UserController::class, 'destroy'])->name('delete-user');

    // Jangkauan
    Route::get('/Jangkauan', [JangkauanController::class, 'dashboardPage'])->name('dashboard-jangkauan');
    Route::post('/Jangkauan/create', [JangkauanController::class, 'store'])->name('create-jangkauan');
    Route::post('/Jangkauan/update', [JangkauanController::class, 'update'])->name('update-jangkauan');
    Route::post('/Jangkauan/delete', [JangkauanController::class, 'destroy'])->name('delete-jangkauan');

   // Layanan
    Route::get('/Layanan', [LayananController::class, 'dashboardPage'])->name('dashboard-layanan');
    Route::post('/Layanan/create', [LayananController::class, 'store'])->name('create-layanan');
    Route::post('/Layanan/update', [LayananController::class, 'update'])->name('update-layanan');
    Route::post('/Layanan/delete', [LayananController::class, 'destroy'])->name('delete-layanan');

   // KategoriInformasiUmum
    Route::get('/KategoriInformasiUmum', [KategoriInformasiUmumController::class, 'dashboardPage'])->name('dashboard-kategori-informasi-umum');
    Route::post('/KategoriInformasiUmum/create', [KategoriInformasiUmumController::class, 'store'])->name('create-kategori-informasi-umum');
    Route::post('/KategoriInformasiUmum/update', [KategoriInformasiUmumController::class, 'update'])->name('update-kategori-informasi-umum');
    Route::post('/KategoriInformasiUmum/delete', [KategoriInformasiUmumController::class, 'destroy'])->name('delete-kategori-informasi-umum');

   // InformasiUmum
    Route::get('/InformasiUmum', [InformasiUmumController::class, 'dashboardPage'])->name('dashboard-informasi-umum');
    Route::post('/InformasiUmum/create', [InformasiUmumController::class, 'store'])->name('create-informasi-umum');
    Route::post('/InformasiUmum/update', [InformasiUmumController::class, 'update'])->name('update-informasi-umum');
    Route::post('/InformasiUmum/delete', [InformasiUmumController::class, 'destroy'])->name('delete-informasi-umum');
});

