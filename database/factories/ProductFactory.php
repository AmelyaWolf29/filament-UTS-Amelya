<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barang' => strtoupper(fake()->bothify('PRD-####')),
            'nama_barang' => fake()->words(3, true),
            'harga' => fake()->numberBetween(10000, 2500000),
            'category_id' => fake()->numberBetween(1, 10),
        ];
    }
}
