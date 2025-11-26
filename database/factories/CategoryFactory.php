<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_kategori' => strtoupper(fake()->bothify('CTG-####')), 
            'nama_kategori' => fake()->words(3, true),     
            'status' => fake()->randomElement(['aktif', 'nonaktif']),
        ];
    }
}
