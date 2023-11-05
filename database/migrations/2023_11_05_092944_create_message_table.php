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
        Schema::create('message', function (Blueprint $table) {
            $table->id();
            $table->datetime('sendtime')->nullable();
            $table->string('login_from', 100);
            $table->string('login_to', 100);
            $table->string("type", 20)->nullable();
            $table->text('message_text')->nullable();
        });

        Schema::table('message', function (Blueprint $table) {
            $table->foreign('login_from')->references('login')->on('user');
            $table->foreign('login_to')->references('login')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
