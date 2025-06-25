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
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id(); // Return ID (Primary Key)

            $table->unsignedBigInteger('purchase_order_id'); // Foreign Key to purchase_orders
            $table->unsignedBigInteger('supplier_id');       // Foreign Key to suppliers

            $table->date('return_date');                     // Date of the return
            $table->decimal('total_return_amount', 15, 2);   // Total value of returned items
            $table->text('reason')->nullable();              // Optional reason for return

            $table->timestamps();

            // Foreign Keys
            $table->foreign('purchase_order_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_returns');
    }
};
