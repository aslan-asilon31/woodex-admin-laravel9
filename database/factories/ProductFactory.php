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
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(mt_rand(1, 2)),
            'slug' => $this->faker->slug(),
            'description' => $this->faker->paragraph(mt_rand(5, 15)),
            'category_id' => mt_rand(1, 3)
        ];
    }
}
