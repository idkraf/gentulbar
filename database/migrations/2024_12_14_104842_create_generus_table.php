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
            $table->int('jenjang')->default(0);
            $table->int('desa')->default(0);
            $table->int('kelompok')->default(0);
            $table->string('kelaskbm')->nullable();
            $table->string('nig')->nullable();
            $table->string('ttl')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('nohp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('mondok')->nullable();
            $table->string('tugas')->nullable();
            $table->string('kerja')->nullable();
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
