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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id(); // Movement ID (primary key)

            // Foreign Key to items/products
            $table->unsignedBigInteger('item_id');

            // Movement Type (e.g., purchase, sale, return, adjust)
            $table->enum('movement_type', ['purchase', 'sale', 'return', 'adjust']);

            // Quantity: positive = stock in, negative = stock out
            $table->integer('quantity');

            // Reference to source document (e.g., purchase order, sale invoice, etc.)
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('reference_type')->nullable(); // e.g., 'purchase', 'sale'

            // Movement Date
            $table->date('date');

            // Timestamps
            $table->timestamps();

            // Foreign key constraint (optional, adjust table name as needed)
            $table->foreign('item_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
