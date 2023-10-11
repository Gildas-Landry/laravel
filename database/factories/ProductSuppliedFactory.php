<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductSuppliedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'product_id' => 4,
            'supplier_id' => 2,
            'quantity_supplied'=>random_int(1,200),
            'expire_date'=> date('d/m/y'),
            'bulk_price' => random_int(10000,1000000),
            'date_supplied' => date('d/m/y'),

        ];
    }
}
