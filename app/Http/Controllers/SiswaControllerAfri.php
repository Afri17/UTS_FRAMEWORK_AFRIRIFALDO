<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SiswaControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_siswa_afri';
    protected string $slug = 'siswa';
    protected string $judul = 'Siswa';

    protected function fields(): array
    {
        return [
            ['name' => 'nis', 'label' => 'NIS', 'type' => 'text', 'rules' => 'required|string|max:20'],
            ['name' => 'nama_siswa', 'label' => 'Nama Siswa', 'type' => 'text', 'rules' => 'required|string|max:100'],
            ['name' => 'jurusan_id', 'label' => 'Jurusan', 'type' => 'select', 'dari' => ['t_jurusan_afri', 'nama_jurusan'], 'rules' => 'nullable|exists:t_jurusan_afri,id'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_siswa_afri')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('nis', 'like', "%{$cari}%")
                    ->orWhere('nama_siswa', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('siswa_afri', compact('data', 'cari'));
    }
}
