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
            $table->foreignId('company_id')->default(1)->constrained();
            $table->string('name')->index();
            $table->string('mark')->nullable();
            $table->integer('unit')->default(1);
            $table->string('class_code',17)->nullable();
            $table->integer('package_code')->nullable();
            $table->boolean('aslbelgi')->default(false);
            $table->double('price',12,2)->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
            $table->integer('length')->default(0);
            $table->integer('weight')->default(0);
            //$table->decimal('volume',5,3)->default(0);
            
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
