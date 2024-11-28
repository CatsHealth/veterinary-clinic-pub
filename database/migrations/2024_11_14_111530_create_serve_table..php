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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique(); 
            $table->integer('price'); 
            $table->integer('duration'); 
            $table->string('caption',255);
            $table->string('recommendation');
            $table->text('description')->nullable();; //{{!!и норм будет выводиться!!}} погуглить 
            $table->boolean('isactive')->default(1);
            $table->string('filename')->default(404);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
