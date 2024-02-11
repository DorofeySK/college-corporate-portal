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
        DB::table('user')->insert(
            array(
                'login' => 'main_admin',
                'password' => Hash::make('gQOZmBwV'),
                'first_name' => 'Главный',
                'second_name' => 'Админимтратор',
                'patronymic' => '',
                'job_id' => json_encode(['jobs' => array(84)]),
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
