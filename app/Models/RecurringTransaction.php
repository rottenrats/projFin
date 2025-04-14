<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecurringTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'frequency',
        'interval',
        'start_date',
        'end_date',
        'last_processed'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'last_processed' => 'datetime'
    ];

    // Отношения
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    // Аксессор для названия частоты
    public function getFrequencyNameAttribute()
    {
        return [
            'daily' => 'Ежедневно',
            'weekly' => 'Еженедельно',
            'monthly' => 'Ежемесячно',
            'yearly' => 'Ежегодно'
        ][$this->frequency];
    }
}
