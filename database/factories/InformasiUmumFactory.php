<?php

namespace Database\Factories;

use App\Models\KategoriInformasiUmum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InformasiUmum>
 */
class InformasiUmumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori_id' => KategoriInformasiUmum::factory(),
            'judul' => $this->faker->sentence(),
            'isi' => $this->faker->paragraph(5),
        ];
    }
}
