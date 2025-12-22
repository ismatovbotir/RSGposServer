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
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->decimal('qty',15,3)->nullable();
            $table->decimal('cost',15,2)->nullable();
            $table->decimal('total',15,2)->nullable();
            $table->date('abc_date');
            //$table->timestamps();
            $table->unique(
                ['shop_id', 'item_id', 'abc_date'],
                'uniq_sells_shop_item_date'
            );
        
            //  индексы (опционально, но рекомендую)
            $table->index(['abc_date', 'shop_id']);
            $table->index(['abc_date', 'item_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sells');
    }
};
