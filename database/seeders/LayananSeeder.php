<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::truncate();

        Layanan::create([
            'judul' => 'Cargo',
            'deskripsi' => 'Layanan pengiriman barang dalam jumlah besar dengan biaya efisien dan jangkauan luas. Cocok untuk kebutuhan distribusi bisnis dengan waktu dan keamanan terjamin.',
            'image' => 'cargo.jpg',
            'harga_per_km' => 6500.00,
            'harga_per_kg' => 800.00,
            'biaya_minimum' => 50000.00,
            'berat_maks_kg' => 3000.00,
            'volume_maks_m3' => 12.00,
            'berat_volumetrik_ratio' => 6000,
        ]);

        Layanan::create([
            'judul' => 'Carter',
            'deskripsi' => 'Solusi fleksibel untuk pengiriman eksklusif menggunakan armada khusus. Barang Anda dikirim langsung tanpa transit — cepat, aman, dan sesuai jadwal Anda.',
            'image' => 'carter.jpg',
            'harga_per_km' => 9000.00,
            'harga_per_kg' => 1500.00,
            'biaya_minimum' => 200000.00,
            'berat_maks_kg' => 1000.00,
            'volume_maks_m3' => 8.00,
            'berat_volumetrik_ratio' => 5000,
        ]);

        Layanan::create([
            'judul' => 'Dokumen',
            'deskripsi' => 'Pengiriman cepat dan aman untuk dokumen penting. Kami pastikan setiap berkas tiba tepat waktu dan dalam kondisi sempurna ke tujuan Anda.',
            'image' => 'dokumen.jpg',
            'harga_per_km' => 7500.00,
            'harga_per_kg' => 2500.00,
            'biaya_minimum' => 20000.00,
            'berat_maks_kg' => 20.00,
            'volume_maks_m3' => 0.2,
            'berat_volumetrik_ratio' => 4000,
        ]);

        // Layanan::factory()->count(100)->create();
    }
}

# php artisan db:seed --class=LayananSeeder
