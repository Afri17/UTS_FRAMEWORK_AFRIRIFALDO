<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class KelasControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_kelas_afri';
    protected string $slug = 'kelas';
    protected string $judul = 'Kelas';

    protected function fields(): array
    {
        return [
            ['name' => 'kode_kelas', 'label' => 'Kode Kelas', 'type' => 'text', 'rules' => 'required|string|max:10'],
            ['name' => 'nama_kelas', 'label' => 'Nama Kelas', 'type' => 'text', 'rules' => 'required|string|max:50'],
            ['name' => 'jurusan_id', 'label' => 'Jurusan', 'type' => 'select', 'dari' => ['t_jurusan_afri', 'nama_jurusan'], 'rules' => 'nullable|exists:t_jurusan_afri,id'],
            ['name' => 'guru_id', 'label' => 'Wali Kelas', 'type' => 'select', 'dari' => ['t_guru_afri', 'nama_guru'], 'rules' => 'nullable|exists:t_guru_afri,id'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_kelas_afri as k')
            ->leftJoin('t_jurusan_afri as j', 'j.id', '=', 'k.jurusan_id')
            ->leftJoin('t_guru_afri as g', 'g.id', '=', 'k.guru_id')
            ->select('k.*', 'j.nama_jurusan', 'g.nama_guru')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('k.kode_kelas', 'like', "%{$cari}%")
                    ->orWhere('k.nama_kelas', 'like', "%{$cari}%")
                    ->orWhere('j.nama_jurusan', 'like', "%{$cari}%")
                    ->orWhere('g.nama_guru', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('kelas_afri', compact('data', 'cari'));
    }
}
