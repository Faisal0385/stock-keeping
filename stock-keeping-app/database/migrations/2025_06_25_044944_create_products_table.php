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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Product ID
            $table->string('name')->unique();
            $table->string('sku')->unique(); // Stock Keeping Unit
            $table->decimal('cost_price', 15, 2);
            $table->decimal('sell_price', 15, 2);
            $table->integer('stock_quantity')->default(0);
            $table->timestamps(); // created_at and updated_at
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
