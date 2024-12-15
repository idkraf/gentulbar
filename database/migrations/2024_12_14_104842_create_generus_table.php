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
            $table->integer('jenjang');
            $table->integer('desa');
            $table->integer('kelompok');
            $table->string('kelaskbm')->nullable();
            $table->string('nig')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('nohp')->nullable();
            $table->string('alamat')->nullable();
            $table->integer('sekolah')->default(0);
            $table->integer('mondok')->default(0);
            $table->integer('tugas')->default(0);
            $table->integer('kerja')->default(0);
            $table->string('keterangan')->nullable();
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
