<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_id',
        'category_id',
        'budget_id',
        'amount',
        'currency',
        'type',
        'description',
        'date',
        'is_recurring'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'date' => 'date',
        'is_recurring' => 'boolean'
    ];

    // Отношения
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function recurringPattern()
    {
        return $this->hasOne(RecurringTransaction::class);
    }

    // Аксессор для форматированной суммы
    public function getFormattedAmountAttribute()
    {
        $sign = $this->type === 'income' ? '+' : '-';
        return $sign . number_format($this->amount, 2) . ' ' . $this->currency;
    }
}
