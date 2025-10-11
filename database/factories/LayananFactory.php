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
        ];
    }
}
