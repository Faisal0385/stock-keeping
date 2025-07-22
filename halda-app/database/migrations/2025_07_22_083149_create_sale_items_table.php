<?php

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
        Schema::create('sale_items', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('sale_id'); // FK to sales table
            $table->unsignedBigInteger('product_id'); // FK to products table

            $table->integer('qty_sold');
            $table->decimal('unit_price', 12, 2);
            $table->decimal('subtotal', 12, 2);

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_items');
    }
};
