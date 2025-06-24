<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id(); // Primary Key

            // Foreign Keys
            $table->unsignedBigInteger('product_id');

            // Quantity and Price
            $table->string('purchase_order_id');
            $table->integer('quantity')->default(0);
            $table->decimal('unit_price', 15, 2)->default(0.00);
            $table->integer('received_quantity')->default(0);
            $table->decimal('subtotal', 15, 2)->default(0.00); // quantity × unit_price

            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // assuming 'products' is your items table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
