<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Good>
 */
class GoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'code' => fake()->numerify('000-######'),
            'price' => fake()->numberBetween(4000, 100000),
            'status' => fake()->numberBetween(1, 4),
            'active' => fake()->boolean(),
        ];
    }
}
