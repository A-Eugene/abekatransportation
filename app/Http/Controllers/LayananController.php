<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function tarif() {
        return view('pages.tarif', [
            'layanan' => Layanan::all()
        ]);
    }
}
