<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence(1),
            'deskripsi' => $this->faker->sentence(12),
            'image' => $this->faker->randomElement([
                'cargo.jpg',
                'carter.jpg',
                'dokumen.jpg',
            ]),
            'harga_per_km' => $this->faker->randomFloat(2, 5000, 10000),
            'harga_per_kg' => $this->faker->randomFloat(2, 500, 3000),
            'biaya_minimum' => $this->faker->randomFloat(2, 15000, 100000),
            'berat_maks_kg' => $this->faker->randomFloat(2, 50, 3000),
            'volume_maks_m3' => $this->faker->randomFloat(3, 0.1, 10),
            'berat_volumetrik_ratio' => $this->faker->randomElement([4000, 5000, 6000])
        ];
    }
}
