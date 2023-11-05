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
            $table->foreignId('payment_id')->nullable();
            $table->json('doc_ids')->nullable();
            $table->string('state', 15)->nullable();
            $table->date('publication_day')->nullable();
            $table->date('update_day')->nullable();
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
