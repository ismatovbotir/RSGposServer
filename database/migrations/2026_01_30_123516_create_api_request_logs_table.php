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
        Schema::create('api_request_logs', function (Blueprint $table) {
            
            $table->id();

            
            $table->string('method', 10);
            $table->string('endpoint');
            $table->ipAddress('ip')->nullable();

            $table->unsignedSmallInteger('status');
            $table->integer('duration_ms');

            $table->json('payload')->nullable();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_request_logs');
    }
};
