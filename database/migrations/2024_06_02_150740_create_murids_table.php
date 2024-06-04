<?php

use App\Models\Kelas;
use App\Models\WaliMurid;
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
        Schema::create('murids', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(WaliMurid::class);
            $table->foreignIdFor(Kelas::class);
            $table->string('name');
            $table->string('wali_murid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murids');
    }
};
