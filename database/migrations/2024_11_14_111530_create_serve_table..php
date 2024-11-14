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
        Schema::create('serve', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique(); ;
            $table->string('doctor'); // Убедитесь, что это поле нужно только один раз
            $table->integer('price')->nullable(); 
            $table->integer('duration')->nullable(); 
            $table->string('caption',255);
            $table->string('recommendation')->nullable();
            $table->text('description')->nullable();; //{{!!и норм будет выводиться!!}} погуглить 
            $table->boolean('isactive')->default(1);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('serve');
    }
};
