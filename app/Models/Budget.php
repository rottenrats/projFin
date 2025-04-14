<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'amount',
        'currency',
        'start_date',
        'end_date',
        'threshold'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
        'threshold' => 'decimal:2'
    ];

    // Отношения
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Аксессор для оставшегося бюджета
    public function getRemainingAttribute()
    {
        $spent = $this->transactions()->sum('amount');
        return $this->amount - abs($spent);
    }
}
