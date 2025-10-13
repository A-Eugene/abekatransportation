<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use App\Models\Jangkauan;
use App\Models\KategoriInformasiUmum;
use App\Models\Layanan;

class LandingController extends Controller
{
    public function beranda() {
        return view('pages.beranda', [
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
        return view('pages.tarif', [
            'layanan' => Layanan::all()
        ]);
    }

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
            'kategoriCurrent' => $kategoriModel->kategori,
            'informasiCurrent' => $kategoriModel->informasiUmum,
            'allKategori' => $allKategori
        ]);
    }



    // public function informasiPerusahaan() {
    //     return view('pages.informasi-perusahaan');
    // }

    // public function informasiPaket() {
    //     return view('pages.informasi-paket');
    // }

    // public function informasiSyaratKetentuan() {
    //     return view('pages.informasi-syarat-ketentuan');
    // }
}
