<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'product_name' => fake()->name(),
            'bulk_quantity_stocked' => random_int(1,100),
            'retail_quantity_stocked' => random_int(1,100),
            'cost_price' => random_int(1,100000),
            'selling_price' => random_int(1,100000),
            'product_image' => fake()->image('public/image',656,889,null, false),
            'category_id'=> random_int(1,5)
        ];
    }
}
