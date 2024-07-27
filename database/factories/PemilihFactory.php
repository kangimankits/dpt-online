<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemilih>
 */
class PemilihFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nik' => fake()->unique()->randomNumber(9),
            'nkk' => fake()->randomNumber(9),
            'nama' => fake()->name(),
            'alamat' => fake()->text(100),
            'tps' => fake()->randomDigitNotZero(1),
        ];
    }
}
