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
        Schema::create('statement', function (Blueprint $table) {
            $table->id();
            $table->index('id');
            $table->string('owner_login', 100);
            $table->string('checker_login', 100);
            $table->foreignId('payment_id');
            $table->json('doc_ids');
            $table->string('state', 15);
            $table->date('publication_day');
            $table->date('update_day');
        });

        Schema::table('statement', function (Blueprint $table) {
            $table->foreign('owner_login')->references('login')->on('user');
            $table->foreign('checker_login')->references('login')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statement');
    }
};
