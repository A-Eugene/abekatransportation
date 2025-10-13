<?php

namespace App\Http\Controllers;

use App\Models\Jangkauan;
use App\Models\Layanan;

class LandingController extends Controller
{
    public function beranda() {
        return view('pages.beranda', [
            'jangkauans' => Jangkauan::all()->map(function ($j) {
                return (object) [
                    'title' => $j->lokasi,
                    'text_1' => $j->alamat,
                    'text_2' => $j->telepon,
                    'image' => $j->image,
                ];
            }),
            'layanans' => Layanan::all()->map(function ($j) {
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
            'layanans' => Layanan::all()
        ]);
    }

    public function profilPerusahaan() {
        return view('pages.profil-perusahaan');
    }

    public function informasiPerusahaan() {
        return view('pages.informasi-perusahaan');
    }

    public function informasiPaket() {
        return view('pages.informasi-paket');
    }

    public function informasiSyaratKetentuan() {
        return view('pages.informasi-syarat-ketentuan');
    }
}
