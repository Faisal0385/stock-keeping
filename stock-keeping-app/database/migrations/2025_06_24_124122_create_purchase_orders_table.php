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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id(); // Purchase Order ID
            $table->string('order_no')->unique(); // PO-1001
            $table->date('order_date'); // Order Date
            $table->enum('status', ['pending', 'received', 'cancelled'])->default('received'); // Status
            $table->decimal('total_amount', 15, 2)->default(0.00); // Total Amount
            $table->text('notes')->nullable(); // Notes
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
