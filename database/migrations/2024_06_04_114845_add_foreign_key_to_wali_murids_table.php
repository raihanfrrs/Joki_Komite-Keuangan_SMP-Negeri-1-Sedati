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
        Schema::table('wali_murids', function (Blueprint $table) {
            $table->foreign(['user_id'], 'wali_murids_ibfk_1')->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['kelas_id'], 'wali_murids_ibfk_2')->references(['id'])->on('kelas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wali_murids', function (Blueprint $table) {
            $table->dropForeign('wali_murids_ibfk_1');
            $table->dropForeign('wali_murids_ibfk_2');
        });
    }
};
