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
        Schema::create('supplies', function (Blueprint $table) {
            // 1. Первичный ключ (PK: supply_id)
            $table->id('supply_id'); 
            
            // 2. Основные поля
            $table->string('title');
            $table->text('description');
            $table->string('category'); // Например, 'Протеин', 'Витамины'
            $table->string('source_url')->nullable(); // Поле source
            
            // 3. Временные метки
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplies');
    }
};
