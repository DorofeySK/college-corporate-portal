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
        Schema::create('fix_statements', function (Blueprint $table) {
            $table->id();
            $table->string('creator_login');
            $table->string('assigner_login')->nullable();
            $table->string('type', 100);
            $table->string('description', 1000)->nullable();
            $table->date('create_at');
            $table->string('state');
        });

        Schema::table('fix_statements', function (Blueprint $table) {
            $table->foreign('creator_login')->references('login')->on('user');
            $table->foreign('assigner_login')->references('login')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fix_statements');
    }
};
