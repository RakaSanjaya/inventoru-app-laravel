<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTransactionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('storage_location_id')->nullable()->constrained('storage_locations')->onDelete('set null');
            $table->integer('quantity');
            $table->enum('transaction_type', ['in', 'out']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_transactions');
    }
}
