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
        Schema::create('guests', function (Blueprint $table) {
            // 1. Первичный ключ (PK: guest_id)
            $table->id('guest_id'); 
            
            // 2. Уникальный токен сессии (обязательное поле)
            $table->string('session_token')->unique(); 
            
            // 3. Имя пользователя (может быть пустым)
            $table->string('username')->nullable(); 
            
            // 4. Время последней активности (для очистки старых гостей)
            $table->timestamp('last_activity_at')->nullable();
            
            // 5. Поля created_at и updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
