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
        Schema::create('guest_exercise', function (Blueprint $table) {
            $table->id('guest_exercise_id');
            $table->foreignId('guest_id')->constrained('guests');
            $table->foreignId('exercise_id')->constrained('exercises');
    
            // Дополнительные поля
            $table->string('note')->nullable(); 
            $table->timestamps();
    
            // !!! КОРРЕКЦИЯ: Добавление уникального индекса для правильного Many-to-Many
            $table->unique(['guest_id', 'exercise_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_exercise');
    }
};
