<?php

namespace Database\Factories;

use App\Enums\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'address' => $this->faker->address,
            'type' => $this->faker->randomElement(PropertyType::options()),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'square_feet' => $this->faker->numberBetween(1000, 5000),
            'year_built' => $this->faker->year,
            'description' => $this->faker->paragraph,
        ];
    }
}
