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
        Schema::table('murids', function (Blueprint $table) {
            $table->foreign(['wali_murid_id'], 'murids_ibfk_1')->references(['id'])->on('wali_murids')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['kelas_id'], 'murids_ibfk_2')->references(['id'])->on('kelas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('murids', function (Blueprint $table) {
            $table->dropForeign('murids_ibfk_1');
            $table->dropForeign('murids_ibfk_2');
        });
    }
};
