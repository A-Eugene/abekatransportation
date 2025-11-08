<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jangkauan;
use App\Models\Layanan;

class JangkauanController extends Controller
{
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
}
