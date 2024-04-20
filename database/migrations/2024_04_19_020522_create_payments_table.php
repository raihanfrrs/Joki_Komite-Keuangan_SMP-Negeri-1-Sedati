<?php

use App\Models\Admin;
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
        Schema::create('payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignIdFor(WaliMurid::class);
            $table->foreignIdFor(Admin::class)->nullable();
            $table->string('name');
            $table->string('necessity');
            $table->date('date');
            $table->bigInteger('nominal');
            $table->enum('status', ['approve', 'decline'])->default('approve');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
