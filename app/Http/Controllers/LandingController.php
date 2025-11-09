<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriInformasiUmum;


class LandingController extends Controller
{
    public function profilPerusahaan() {
        return view('pages.landing.profil-perusahaan');
    }
}
