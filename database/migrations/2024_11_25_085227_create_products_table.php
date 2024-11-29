<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('sku')->unique();
            $table->integer('stock')->default(0);
            $table->decimal('price', 15, 2);
            $table->text('description')->nullable();

            // Adding storage_location_id column with a foreign key relationship to the storage_locations table
            $table->foreignId('storage_location_id')->nullable()->constrained('storage_locations')->onDelete('set null');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}
