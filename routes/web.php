<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/company', function () {
    return view('pages.companyprofile');
})->name('company');

