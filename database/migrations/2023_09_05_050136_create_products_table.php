<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Category::class)->nullable();//->references('id')->on('categories');
            $table->string('product_name');
            $table->unsignedInteger('bulk_quantity_stocked');
            $table->unsignedInteger('retail_quantity_stocked')->nullable();
            $table->unsignedInteger('cost_price')->nullable();
            $table->unsignedInteger('selling_price')->nullable();
            $table->string('product_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
