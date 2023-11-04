<?php

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_solds',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->foreignIdFor(Sale::class);
            $table->unsignedInteger('bulk_selling_price');
            $table->unsignedInteger('retail_selling_price');
            $table->unsignedInteger('quantity_sold');
            $table->date('date_sold');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
