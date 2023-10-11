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
            //$table->foreignId('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->foreignIdFor(Sale::class);
            $table->unsignedInteger('bulk_selling_price');
            $table->unsignedInteger('retail_selling_price');
            $table->unsignedInteger('quantity_sold');
            $table->date('date_sold')->date_format('dd/mm/yyyy');
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
