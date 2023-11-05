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
        Schema::create('user', function (Blueprint $table) {
            $table->string('login', 100);
            $table->primary('login');
            $table->index('login');
            $table->string('password', 100);
            $table->string('first_name', 100);
            $table->string('second_name', 100);
            $table->foreignId('job_id');
            $table->foreignId('department_id');
            $table->string('header', 100)->nullable();
            $table->json('open_for')->nullable();
        });
        Schema::table('user', function (Blueprint $table) {
            $table->foreign('header')->references('login')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
