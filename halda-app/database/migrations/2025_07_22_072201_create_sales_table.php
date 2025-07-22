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
        Schema::create('sales', function (Blueprint $table) {
            $table->id(); // Sale ID (auto-increment)
            $table->date('sale_date');
            $table->string('sale_code')->unique(); // SL-3001
            $table->string('customer_name')->nullable();
            $table->enum('status', ['Pending', 'Completed', 'Cancelled'])->default('Pending');
            $table->decimal('total_amount', 12, 2)->default(0.00);
            $table->text('notes')->nullable();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
