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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('type')->default(1);//1Andalusgo,2Wolt
            $table->string('code')->nullable();
            $table->string("client")->nullable();
            $table->string("phone")->nullable();
            $table->text("address")->nullable();
            $table->text('comment')->nullable();
            $table->text('fiscal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
