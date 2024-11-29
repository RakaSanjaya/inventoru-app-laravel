<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryActivitiesTable extends Migration
{
    public function up(): void
    {
        Schema::create('history_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade'); // Relasi ke tabel products
            $table->enum('activity_type', [
                'added',  // Barang baru ditambahkan
                'removed', // Barang dihapus
                'updated', // Barang diubah
                'stock_in', // Stok masuk (penambahan stok)
                'stock_out', // Stok keluar (pengurangan stok)
            ]);
            $table->integer('quantity_change')->nullable(); // Perubahan stok (untuk stok masuk atau keluar)
            $table->text('description')->nullable(); // Deskripsi aktivitas
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_activities');
    }
}
