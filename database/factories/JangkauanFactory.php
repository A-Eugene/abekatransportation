<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jangkauan>
 */
class JangkauanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lokasi' => $this->faker->city(),
            'alamat' => $this->faker->address(),
            'telepon' => '08' . $this->faker->randomNumber(9, true),
            'image' => $this->faker->randomElement([
                'surabaya.jpeg',
                'kediri.jpg',
                'tulungagung.jpg',
            ]),
        ];
    }
}
