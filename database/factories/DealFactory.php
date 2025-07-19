<?php

namespace Database\Factories;

use App\Enums\DealStatus;
use App\Enums\DealType;
use App\Enums\CommissionType;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deal>
 */
class DealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'property_id' => Property::factory(),
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement(DealType::options()),
            'status' => $this->faker->randomElement(DealStatus::options()),
            'property_price' => $this->faker->randomFloat(2, 100000, 1000000),
            'commission_type' => $this->faker->randomElement(CommissionType::options()),
            'commission_amount' => $this->faker->randomFloat(2, 0, 100000),
            'commission_percentage' => $this->faker->randomFloat(2, 0, 100),
            'owner_name' => $this->faker->name,
            'owner_phone' => $this->faker->phoneNumber,
            'owner_email' => $this->faker->email,
        ];
    }
}
