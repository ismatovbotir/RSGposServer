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
            $table->double('order_qty',3);
            $table->double('order_price',2);
            $table->double('dilivery_qty',3)->default(0);
            $table->double('dilivery_price',2)->default(0);
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
