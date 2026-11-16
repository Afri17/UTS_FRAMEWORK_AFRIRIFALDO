<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_nilai_afri', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('pelajaran_id');
            $table->integer('tugas')->default(0);
            $table->integer('uts')->default(0);
            $table->integer('uas')->default(0);
            $table->decimal('nilai_akhir', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('t_nilai_afri');
    }
};
