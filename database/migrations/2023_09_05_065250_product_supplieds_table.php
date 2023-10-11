<?php

use App\Models\Product;
use App\Models\Supplier;
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
        Schema::create('product_supplieds',function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Product::class)->cascadeOnDelete();
            $table->foreignIdFor(Supplier::class);
           // $table->foreignId('product_id')->references('id')->on('products');//->cascadeOnDelete();
            $table->unsignedInteger('quantity_supplied');
            $table->date('expire_date');
            $table->unsignedInteger('bulk_price');
            $table->date('date_supplied');
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
