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
        Schema::create('generus', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('gender')->nullable();
            $table->int('jenjang')->nullable();
            $table->int('desa')->nullable();
            $table->int('kelompok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generus');
    }
};
