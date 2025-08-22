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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('category_id')->nullable()->constrained();
            $table->foreignId('partner_id')->nullable()->constrained();

            $table->string('name');
            $table->string('mark')->nullable();
            $table->string('mxik')->nullable();
            
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('length')->default(0);
            $table->integer('weight')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
