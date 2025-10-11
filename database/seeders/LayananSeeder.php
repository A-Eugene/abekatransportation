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
            'image' => 'cargo.jpg'
        ]);

        Layanan::create([
            'judul' => 'Carter',
            'deskripsi' => 'Solusi fleksibel untuk pengiriman eksklusif menggunakan armada khusus. Barang Anda dikirim langsung tanpa transit — cepat, aman, dan sesuai jadwal Anda.',
            'image' => 'carter.jpg'
        ]);

        Layanan::create([
            'judul' => 'Dokumen',
            'deskripsi' => 'Pengiriman cepat dan aman untuk dokumen penting. Kami pastikan setiap berkas tiba tepat waktu dan dalam kondisi sempurna ke tujuan Anda.',
            'image' => 'dokumen.jpg'
        ]);

        Layanan::factory()->count(100)->create();
    }
}

# php artisan db:seed --class=LayananSeeder
