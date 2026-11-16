<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeederAfri extends Seeder
{
    public function run(): void
    {
        DB::table('t_jurusan_afri')->insert([
            ['kode_jurusan' => 'SI', 'nama_jurusan' => 'Sistem Informasi'],
            ['kode_jurusan' => 'TI', 'nama_jurusan' => 'Teknik Informatika'],
        ]);
        DB::table('t_guru_afri')->insert([
            ['nip' => 'G-01', 'nama_guru' => 'Herianto'],
            ['nip' => 'G-02', 'nama_guru' => 'Dewi Lestari'],
        ]);
        DB::table('t_siswa_afri')->insert([
            ['nis' => '101', 'nama_siswa' => 'Roni Satria', 'jurusan_id' => 1],
            ['nis' => '102', 'nama_siswa' => 'Budiman Halim', 'jurusan_id' => 1],
            ['nis' => '103', 'nama_siswa' => 'Syafrizal', 'jurusan_id' => 2],
            ['nis' => '104', 'nama_siswa' => 'Juniwong', 'jurusan_id' => 2],
        ]);
        DB::table('t_pelajaran_afri')->insert([
            ['kode_pelajaran' => 'PL-1', 'nama_pelajaran' => 'Matematika'],
            ['kode_pelajaran' => 'PL-2', 'nama_pelajaran' => 'Bahasa Inggris'],
            ['kode_pelajaran' => 'PL-3', 'nama_pelajaran' => 'Bahasa Indonesia'],
            ['kode_pelajaran' => 'PL-4', 'nama_pelajaran' => 'Pancasila'],
            ['kode_pelajaran' => 'PL-5', 'nama_pelajaran' => 'Fisika'],
        ]);
        DB::table('t_kurikulum_afri')->insert([
            ['kode_kurikulum' => 'KR-1', 'nama_kurikulum' => 'Kurikulum Merdeka', 'tahun' => '2022/2023', 'keterangan' => 'Kurikulum utama'],
            ['kode_kurikulum' => 'KR-2', 'nama_kurikulum' => 'Kurikulum 2013', 'tahun' => '2013/2014', 'keterangan' => 'Kurikulum lama'],
        ]);
        DB::table('t_kelas_afri')->insert([
            ['kode_kelas' => 'KL-1', 'nama_kelas' => 'X-A', 'jurusan_id' => 1, 'guru_id' => 1],
            ['kode_kelas' => 'KL-2', 'nama_kelas' => 'X-B', 'jurusan_id' => 2, 'guru_id' => 2],
        ]);
        DB::table('t_jadwal_afri')->insert([
            ['kelas_id' => 1, 'pelajaran_id' => 1, 'guru_id' => 1, 'hari' => 'Senin', 'jam_mulai' => '08:00', 'jam_selesai' => '09:30'],
            ['kelas_id' => 2, 'pelajaran_id' => 2, 'guru_id' => 2, 'hari' => 'Selasa', 'jam_mulai' => '10:00', 'jam_selesai' => '11:30'],
        ]);
        DB::table('t_nilai_afri')->insert([
            ['siswa_id' => 1, 'pelajaran_id' => 1, 'tugas' => 80, 'uts' => 75, 'uas' => 85, 'nilai_akhir' => 80],
            ['siswa_id' => 2, 'pelajaran_id' => 2, 'tugas' => 70, 'uts' => 78, 'uas' => 82, 'nilai_akhir' => 76.67],
        ]);
    }
}
