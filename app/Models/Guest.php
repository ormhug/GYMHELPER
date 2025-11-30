<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    // Указываем Laravel, какие поля можно заполнять (для создания нового гостя)
    protected $fillable = ['session_token', 'username', 'last_activity_at'];

    // Связь с избранными упражнениями через Pivot-таблицу 'gexercises'
    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'gexercises', 'guest_id', 'exercise_id')
                    ->withPivot('note'); // Разрешаем доступ к полю 'note'
    }

    // Связь с избранным питанием через Pivot-таблицу 'gsupplies'
    public function supplies()
    {
        return $this->belongsToMany(Supply::class, 'gsupplies', 'guest_id', 'supply_id')
                    ->withPivot('is_purchased'); // Разрешаем доступ к полю 'is_purchased'
    }
}
