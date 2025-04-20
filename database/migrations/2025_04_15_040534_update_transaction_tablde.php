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
        Schema::table('transactions', function (Blueprint $table) {
            // Удаляем user_id, если он существует
            if (Schema::hasColumn('transactions', 'user_id')) {
                $table->dropForeign(['user_id']); // если был внешний ключ
                $table->dropColumn('user_id');
            }

            // Добавляем company_id
            $table->unsignedBigInteger('company_id')->after('id');

            // Если есть таблица companies, добавим внешний ключ
            if (Schema::hasTable('companies')) {
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (Schema::hasColumn('transactions', 'company_id')) {
                $table->dropForeign(['company_id']);
                $table->dropColumn('company_id');
            }

            // Восстановим user_id
            $table->unsignedBigInteger('user_id')->nullable();
            // $table->foreign('user_id')->references('id')->on('users'); // если нужен внешний ключ
        });
    }
};
