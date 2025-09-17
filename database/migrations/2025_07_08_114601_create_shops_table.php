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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            //$table->integer('erp_id')->nullable();
            $table->foreignId('company_id')->constrained();
            //$table->foreignUuid('company_id')->nullable()->constrained();
            $table->string('name');
            $table->foreignId('price_id')->nullable()->constrained();
            $table->double('area',5,3)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
