<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class NilaiControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_nilai_afri';
    protected string $slug = 'nilai';
    protected string $judul = 'Nilai';

    protected function fields(): array
    {
        return [
            ['name' => 'siswa_id', 'label' => 'Siswa', 'type' => 'select', 'dari' => ['t_siswa_afri', 'nama_siswa'], 'rules' => 'required|exists:t_siswa_afri,id'],
            ['name' => 'pelajaran_id', 'label' => 'Pelajaran', 'type' => 'select', 'dari' => ['t_pelajaran_afri', 'nama_pelajaran'], 'rules' => 'required|exists:t_pelajaran_afri,id'],
            ['name' => 'tugas', 'label' => 'Nilai Tugas', 'type' => 'number', 'rules' => 'required|integer|between:0,100'],
            ['name' => 'uts', 'label' => 'Nilai UTS', 'type' => 'number', 'rules' => 'required|integer|between:0,100'],
            ['name' => 'uas', 'label' => 'Nilai UAS', 'type' => 'number', 'rules' => 'required|integer|between:0,100'],
        ];
    }

    // Nilai akhir dihitung otomatis: rata-rata tugas, UTS, dan UAS
    protected function olah(array $data): array
    {
        $data['nilai_akhir'] = round(($data['tugas'] + $data['uts'] + $data['uas']) / 3, 2);
        return $data;
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_nilai_afri as n')
            ->join('t_siswa_afri as s', 's.id', '=', 'n.siswa_id')
            ->join('t_pelajaran_afri as p', 'p.id', '=', 'n.pelajaran_id')
            ->select('n.*', 's.nis', 's.nama_siswa', 'p.nama_pelajaran')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('s.nis', 'like', "%{$cari}%")
                    ->orWhere('s.nama_siswa', 'like', "%{$cari}%")
                    ->orWhere('p.nama_pelajaran', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('nilai_afri', compact('data', 'cari'));
    }
}
