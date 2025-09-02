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
        Schema::create('price_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('attribute_id')->nullable()->constrained();
            $table->foreignId('price_id')->constrained();
            $table->double('value',15,2);
            $table->timestamps();
            $table->unique(['item_id','price_id']);
            //$table->unique(['item_id','attribute_id','price_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_data');
    }
};
