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
        Schema::create('supplier_transactions', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->enum('type', ['purchase_payment', 'advance_payment', 'return_credit', 'adjustment']);
            $table->decimal('amount', 15, 2);
            $table->string('reference');
            $table->date('date');
            $table->text('notes')->nullable();
            $table->timestamps();

            // $table->foreign('supplier_id')->references('id')->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_transactions');
    }
};
