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
        Schema::create('paymentdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id');
            $table->string('name', 200);
            $table->string('period', 50);
            $table->float('amount', 10, 2);
            $table->string('amount_type', 10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentdetail');
    }
};
