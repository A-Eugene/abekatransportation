<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriInformasiUmum;


class InformasiUmumController extends Controller
{
    public function profilPerusahaan() {
        return view('pages.profil-perusahaan');
    }

    public function informasiUmum($kategori = '')
    {
        $kategoriModel = $kategori === ''
            ? KategoriInformasiUmum::with('informasiUmum')->first()
            : KategoriInformasiUmum::with('informasiUmum')->where('kategori', $kategori)->firstOrFail();

        $allKategori = KategoriInformasiUmum::with('informasiUmum')->get();

        return view('pages.informasi-umum', [
            'kategoriModel' => $kategoriModel,
            'allKategori' => $allKategori
        ]);
    }
}
