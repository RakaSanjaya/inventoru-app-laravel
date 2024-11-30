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
            $table->string('actor')->nullable();
            $table->string('name_product')->nullable();
            $table->enum('activity_type', [
                'added',
                'removed',
                'updated',
                'stock_in',
                'stock_out',
            ]);
            $table->integer('quantity_change')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_activities');
    }
}
