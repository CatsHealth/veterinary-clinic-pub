<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('text');
            $table->string('photo')->nullable(); // Поле может быть пустым
            $table->timestamps(); // Добавляет поля created_at и updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews'); // Удаление таблицы
    }
}
