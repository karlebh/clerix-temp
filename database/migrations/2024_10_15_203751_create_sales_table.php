<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->date('date');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->decimal('total_amount', 12, 2);
            $table->boolean('is_returned')->default(false);
            $table->boolean('is_paid')->default(true);
            $table->decimal('discount', 12, 2);
            $table->decimal('receivable', 12, 2);
            $table->decimal('received', 12, 2);
            $table->decimal('due', 12, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
