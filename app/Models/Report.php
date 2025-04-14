<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'period_start',
        'period_end',
        'parameters',
        'data'
    ];

    protected $casts = [
        'period_start' => 'date',
        'period_end' => 'date',
        'parameters' => 'json',
        'data' => 'json'
    ];

    // Отношения
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Аксессор для названия отчета
    public function getReportTypeAttribute()
    {
        return [
            'cash_flow' => 'Движение средств',
            'category_spending' => 'Расходы по категориям',
            'budget_progress' => 'Прогресс бюджета'
        ][$this->type] ?? 'Неизвестный отчет';
    }
}
