<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiUmum extends Model
{
    use HasFactory;

    protected $table = "informasi_umum";
    protected $fillable = ['kategori_id', 'judul', 'isi'];

    public function kategori()
    {
        return $this->belongsTo(KategoriInformasiUmum::class, 'kategori_id');
    }

    public $timestamps = false;

    public static function dashboardRelationDisplay(): array
    {
        return [
            'kategori_id' => [
                'relation' => 'kategori',
                'foreign_model' => 'Kategori Informasi Umum',
                'foreign_columns' => [
                    'kategori' => 'Kategori'
                ]
            ]
        ];
    }
}
