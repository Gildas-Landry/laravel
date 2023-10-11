<?php

namespace Database\Factories;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'address' => fake()->address(),
            'phone_number'=>fake()->phoneNumber(),
            'email'=> fake()->email(),
            'supplier_picture' => fake()->image('public/image', 640, 480, null, false),
        ];
    }
}
