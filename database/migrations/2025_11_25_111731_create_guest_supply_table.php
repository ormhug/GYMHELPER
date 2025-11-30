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
        Schema::create('gsupplies', function (Blueprint $table) {
            // 1. Первичный ключ (PK)
            $table->id('guest_supply_id'); 
            
            // 2. Внешний ключ: Гость (FK)
            $table->foreignId('guest_id')->constrained('guests');
            
            // 3. Внешний ключ: Добавка (FK)
            // 'supply_id' - имя колонки, 'supplies' - имя таблицы, 'supply_id' - имя PK в таблице supplies
            $table->foreignId('supply_id')->constrained('supplies', 'supply_id'); 
            
            // 4. Дополнительное поле
            $table->boolean('is_purchased')->default(false); 
            
            // 5. Временные метки
            $table->timestamps();
            
            // !!! КЛЮЧЕВОЙ МОМЕНТ: Уникальный индекс для предотвращения дублирования
            // Это гарантирует, что гость может сохранить одну пару (guest_id, supply_id) только один раз.
            $table->unique(['guest_id', 'supply_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_supply');
    }
};
