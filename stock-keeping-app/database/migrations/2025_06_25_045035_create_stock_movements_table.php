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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id(); // Movement ID (Primary Key)

            // Foreign Key to Products Table
            $table->unsignedBigInteger('item_id');

            // Type of Movement
            $table->enum('movement_type', ['purchase', 'sale', 'return', 'adjust']);

            // Quantity: positive = stock in, negative = stock out
            $table->integer('quantity');

            // Polymorphic Reference
            $table->unsignedBigInteger('reference_id')->nullable(); // ID of the source (purchase/sale)
            $table->string('reference_type')->nullable();           // Table name of the source

            // Movement Date
            $table->date('date');

            $table->timestamps();

            // Foreign Key Constraint to products table
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
