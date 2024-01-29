<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('statement', function (Blueprint $table) {
            $table->string('description', 1000)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('statement', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
