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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('order_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->decimal('order_qty',10,3);
            $table->decimal('order_price',10,2);
            $table->decimal('delivery_qty',10,3)->default(0);
            $table->decimal('delivery_price',10,2)->default(0);
            $table->string('comment')->nullable();
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
