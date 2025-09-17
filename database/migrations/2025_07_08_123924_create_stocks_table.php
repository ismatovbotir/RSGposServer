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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('attribute_id')->nullable()->constrained();
            $table->foreignId('department_id')->nullable()->default(1)->constrained();
            $table->double('qty',15,3)->default(0);
            $table->timestamps();
            $table->unique(['item_id','department_id','shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};
