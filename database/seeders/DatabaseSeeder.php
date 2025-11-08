<?php

namespace Database\Seeders;

use App\Models\KategoriInformasiUmum;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KategoriInformasiUmumSeeder::class,
            InformasiUmumSeeder::class,
            JangkauanSeeder::class,
            LayananSeeder::class,
            UserSeeder::class
        ]);
    }
}
