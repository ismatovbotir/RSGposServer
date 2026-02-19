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
        Schema::create('receipt_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receipt_id');
            $table->foreignId('item_id')->constrained();
            $table->string('gtin')->nullable();
            $table->foreignId('attribute_id')->nullable()->constrained();
            $table->boolean('status')->default(true);
            $table->decimal('qty',10,3);
            $table->decimal('price',15,2);
            $table->decimal('sub_total',15,2)->default(0);
            $table->decimal('discount',15,2)->default(0);
            $table->decimal('round',8,2)->default(0);
            $table->decimal('total',15,2)->default(0);
            
            
            
            
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_items');
    }
};
