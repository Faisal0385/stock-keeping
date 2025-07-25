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
        Schema::create('purchase_order_items', function (Blueprint $table) {
            $table->id();

            // Foreign key to purchase_orders table
            $table->foreignId('purchase_order_id')->constrained('purchase_orders')->onDelete('cascade');

            // Store date as date type (not string)
            $table->string('date');

            // product_id should be unsignedBigInteger if referring to products table
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');

            // Quantity received as integer
            $table->integer('received_qty');

            // Prices with decimal (15, 2)
            $table->decimal('unit_price', 15, 2);
            $table->decimal('subtotal', 15, 2);

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_items');
    }
};
