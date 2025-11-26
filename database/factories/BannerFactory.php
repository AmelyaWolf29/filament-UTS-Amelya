<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(10, true),
            'subtitle' => fake()->unique()->words(20, true),
            'image_url' => fake()->imageUrl(800, 600),
            'link_url' => fake()->url,
            'position' => fake()->randomElement(['top', 'sidebar', 'footer', 'popup']),
            'order_index' => fake()->numberBetween(1, 10),
            'is_active' => fake()->boolean(50),
            'start_date' => now(),
            'end_date' => now()->addDays(7),
        ];
    }
}
