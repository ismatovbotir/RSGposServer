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
        Schema::create('price_cheker_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('price_checker_id')->constrained();
            $table->string('scanned');
            $table->foreignId('item_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_cheker_statistics');
    }
};
