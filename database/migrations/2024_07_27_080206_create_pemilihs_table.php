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
        Schema::create('pemilihs', function (Blueprint $table) {
            $table->string('nik', 16)->unique()->primary();
            $table->string('nkk', 16)->index();
            $table->string('nama', 200);
            $table->string('alamat', 300);
            $table->tinyInteger('tps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilihs');
    }
};
