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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('account_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('budget_id')->nullable()->constrained()->onDelete('set null');
            
            // Финансовые данные
            $table->decimal('amount', 12, 2); // До 9999999999.99
            $table->enum('type', ['income', 'expense', 'transfer']);
            $table->char('currency', 3)->default('USD');
            
            // Мета-данные
            $table->date('date');
            $table->text('description')->nullable();
            $table->boolean('recurring')->default(false);
            
            // Системные поля
            $table->timestamps();
            $table->softDeletes();

            // Индексы для оптимизации
            $table->index('date');
            $table->index('type');
            $table->index(['user_id', 'account_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
