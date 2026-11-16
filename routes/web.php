<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerAfri;
use App\Http\Controllers\SiswaControllerAfri;
use App\Http\Controllers\GuruControllerAfri;
use App\Http\Controllers\JurusanControllerAfri;
use App\Http\Controllers\PelajaranControllerAfri;
use App\Http\Controllers\KurikulumControllerAfri;
use App\Http\Controllers\KelasControllerAfri;
use App\Http\Controllers\JadwalControllerAfri;
use App\Http\Controllers\NilaiControllerAfri;

Route::get('/', fn () => redirect('/pelajaran'));

// Login khusus admin
Route::get('/login', [AuthControllerAfri::class, 'formLogin'])->name('login');
Route::post('/login', [AuthControllerAfri::class, 'login']);
Route::post('/logout', [AuthControllerAfri::class, 'logout'])->middleware('auth');

$modul = [
    'siswa'     => SiswaControllerAfri::class,
    'guru'      => GuruControllerAfri::class,
    'jurusan'   => JurusanControllerAfri::class,
    'pelajaran' => PelajaranControllerAfri::class,
    'kurikulum' => KurikulumControllerAfri::class,
    'kelas'     => KelasControllerAfri::class,
    'jadwal'    => JadwalControllerAfri::class,
    'nilai'     => NilaiControllerAfri::class,
];

foreach ($modul as $slug => $controller) {
    // Semua orang (siswa) bisa melihat data tanpa login
    Route::get("/$slug", [$controller, 'index']);

    // Hanya admin (harus login) yang bisa tambah, ubah, dan hapus
    Route::middleware('auth')->group(function () use ($slug, $controller) {
        Route::get("/$slug/tambah", [$controller, 'create']);
        Route::post("/$slug", [$controller, 'store']);
        Route::get("/$slug/{id}/edit", [$controller, 'edit']);
        Route::put("/$slug/{id}", [$controller, 'update']);
        Route::delete("/$slug/{id}", [$controller, 'destroy']);
    });
}
