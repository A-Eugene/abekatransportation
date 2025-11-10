<?php

namespace Database\Seeders;

use App\Models\KategoriInformasiUmum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriInformasiUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Pengiriman',
            'Tarif & Biaya',
            'Kebijakan & Syarat',
            'Promo & Penawaran',
            'Kontak & Dukungan'
        ];

        foreach ($categories as $kategori) {
            KategoriInformasiUmum::create(['kategori' => $kategori]);
        }

        // KategoriInformasiUmum::factory(100)->create();
    }
}

# php artisan db:seed --class=KategoriInformasiUmumSeeder
