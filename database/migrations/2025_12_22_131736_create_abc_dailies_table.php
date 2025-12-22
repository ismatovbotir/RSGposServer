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
        Schema::create('abc_dailies', function (Blueprint $table) {
            $table->id();
            $table->date('abc_date');
            $table->foreignId('shop_id')->constrained();
            $table->foreignId('item_id')->constrained();
        
            // 🔹 показатели
            $table->decimal('qty', 15, 3);
            $table->decimal('turnover', 15, 2); // оборот
            $table->decimal('profit', 15, 2)->nullable();
        
            // 🔹 ABC классы
            $table->char('abc_qty', 1)->nullable();
            $table->char('abc_turnover', 1)->nullable();
            $table->char('abc_profit', 1)->nullable();
        
            $table->unique(['abc_date', 'shop_id', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abc_dailies');
    }
};
