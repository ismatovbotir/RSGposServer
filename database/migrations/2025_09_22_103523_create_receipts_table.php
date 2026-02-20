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
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->string('no')->nullable();
            $table->string('barcode')->nullable();
            $table->string('shift')->nullable();
            $table->date('receipt_date');
            $table->dateTime('dateOpen')->nullable();
            $table->dateTime('dateClose')->nullable();
            $table->string('type')->default('sell');
            $table->string('cashier')->nullable();
            $table->string('consultant')->nullable();
            $table->foreignId('shop_id')->nullable()->constrained();
            $table->foreignId('pos_id')->nullable()->constrained();
            $table->boolean('status')->default(true);
            $table->string('client_id')->nullable();
            $table->string('client_card')->nullable();
            $table->string('client_name')->nullable();
            $table->string('client_phone')->nullable();
            $table->decimal('sub_total',15,2)->default(0);
            $table->decimal('discount',15,2)->default(0);
            $table->decimal('total',15,2);
            $table->string('fiscal')->nullable();
            $table->timestamps();
            $table->unique(['receipt_date','barcode','shop_id','pos_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
    }
};
