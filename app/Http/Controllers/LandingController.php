<?php

namespace App\Http\Controllers;

use App\Models\Jangkauan;

class LandingController extends Controller
{
    public function beranda() {
        return view('pages.beranda', [
            'jangkauans' => Jangkauan::all()
        ]);
    }

    public function profilPerusahaan() {
        return view('pages.profil-perusahaan');
    }
}
