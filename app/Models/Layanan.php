<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    /** @use HasFactory<\Database\Factories\LayananFactory> */
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'image',
        'harga_per_km',
        'harga_per_kg',
        'biaya_minimum',
        'berat_maks_kg',
        'volume_maks_m3',
        'berat_volumetrik_ratio',
    ];

    public $timestamps = false;
}
