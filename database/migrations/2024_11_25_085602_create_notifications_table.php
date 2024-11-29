<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->text('message'); // Pesan notifikasi
            $table->boolean('is_read')->default(false); // Status notifikasi sudah dibaca atau belum
            $table->boolean('is_deleted')->default(false); // Status apakah notifikasi sudah dihapus
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
