<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(5)->create();
         \App\Models\ProductSold::factory(5)->create();
         \App\Models\ProductSupplied::factory(5)->create();
         \App\Models\Category::factory(5)->create();
         \App\Models\Product::factory(15)->create();
        \App\Models\Sale::factory(5)->create();
            \App\Models\Supplier::factory(15)->create();
         \App\Models\User::factory()->create([
            'name' => 'Test User',
             'email' => 'test@example.com',
         ]);


    }
}
