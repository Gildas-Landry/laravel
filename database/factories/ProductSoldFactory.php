<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductSoldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => random_int(1,15),
            'sale_id' => random_int(1,15),
            'bulk_selling_price' => random_int(1000,1000000),
            'retail_selling_price' => random_int(1000,1000000),
            'quantity_sold' => random_int(0,100),
            'date_sold' =>date('d-m-y'),

        ];
    }
}
