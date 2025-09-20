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
            $table->foreignId('company_id')->default(1)->constrained();
            $table->foreignId('shop_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->foreignId('attribute_id')->nullable()->constrained();
            $table->foreignId('department_id')->default(1)->constrained();
            $table->decimal('qty',15,3)->default(0);
            $table->decimal('cost',15,2)->default(0);
            $table->date('stock_date');
            $table->timestamps();
            $table->unique(['item_id','department_id','shop_id','stock_date']);
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
