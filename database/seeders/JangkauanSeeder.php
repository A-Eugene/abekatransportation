<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Jangkauan;

class JangkauanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jangkauan::truncate();

        Jangkauan::create([
            'lokasi' => 'Surabaya',
            'alamat' => 'Jl. Pergudangan Margomulyo Permai No.20 A Blok J, Greges, Kec. Asem Rowo, Surabaya, Jawa Timur 60183',
            'telepon' => '0852-2364-1947',
            'image' => 'surabaya.jpeg'
        ]);

        Jangkauan::create([
            'lokasi' => 'Kediri',
            'alamat' => 'Ruko Banaran, Jl. Kapten Tendean No.5, Tosaren, Pesantren, Kota Kediri, Jawa Timur 64133',
            'telepon' => '0823-4809-0700',
            'image' => 'kediri.jpg'
        ]);

        Jangkauan::create([
            'lokasi' => 'Tulungagung',
            'alamat' => 'Jl. Pangeran Antasari, Kenayan, Kec. Tulungagung, Kabupaten Tulungagung, Jawa Timur 66212',
            'telepon' => '0851-0079-8845',
            'image' => 'tulungagung.jpg'
        ]);

        Jangkauan::factory()->count(100)->create();
    }
}

# php artisan db:seed --class=JangkauanSeeder
