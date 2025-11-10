<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriInformasiUmum;
use App\Models\Jangkauan;
use App\Models\Layanan;


class LandingController extends Controller
{
    public function profilPerusahaan() {
        return view('pages.landing.profil-perusahaan');
    }

    public function beranda() {
        return view('pages.landing.beranda', [
            'jangkauan' => Jangkauan::all()->map(function ($j) {
                return (object) [
                    'title' => $j->lokasi,
                    'text_1' => $j->alamat,
                    'text_2' => $j->telepon,
                    'image' => $j->image,
                ];
            }),
            'layanan' => Layanan::all()->map(function ($j) {
                return (object) [
                    'title' => $j->judul,
                    'text_1' => $j->deskripsi,
                    'image' => $j->image
                ];
            })
        ]);
    }

    public function tarif() {
        return view('pages.landing.tarif', [
            'layanan' => Layanan::all()
        ]);
    }

    public function informasiUmum($kategori = '')
    {
        $kategoriModel = $kategori === ''
            ? KategoriInformasiUmum::with('informasiUmum')->first()
            : KategoriInformasiUmum::with('informasiUmum')->where('kategori', $kategori)->firstOrFail();

        $allKategori = KategoriInformasiUmum::with('informasiUmum')->get();

        return view('pages.landing.informasi-umum', [
            'kategoriModel' => $kategoriModel,
            'allKategori' => $allKategori
        ]);
    }
}
