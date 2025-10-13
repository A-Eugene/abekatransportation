<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriInformasiUmum extends Model
{
    use HasFactory;

    protected $table = "kategori_informasi_umum";

    protected $fillable = ['kategori'];

    public function informasiUmum()
    {
        return $this->hasMany(InformasiUmum::class, 'kategori_id');
    }

    public $timestamps = false;
}
