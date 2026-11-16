<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_kelas_afri', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kelas', 10);
            $table->string('nama_kelas', 50);
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_kelas_afri');
    }
};
