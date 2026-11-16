<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class JadwalControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_jadwal_afri';
    protected string $slug = 'jadwal';
    protected string $judul = 'Jadwal';

    protected function fields(): array
    {
        return [
            ['name' => 'kelas_id', 'label' => 'Kelas', 'type' => 'select', 'dari' => ['t_kelas_afri', 'nama_kelas'], 'rules' => 'required|exists:t_kelas_afri,id'],
            ['name' => 'pelajaran_id', 'label' => 'Pelajaran', 'type' => 'select', 'dari' => ['t_pelajaran_afri', 'nama_pelajaran'], 'rules' => 'required|exists:t_pelajaran_afri,id'],
            ['name' => 'guru_id', 'label' => 'Guru', 'type' => 'select', 'dari' => ['t_guru_afri', 'nama_guru'], 'rules' => 'required|exists:t_guru_afri,id'],
            ['name' => 'hari', 'label' => 'Hari', 'type' => 'select', 'opsi' => ['Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jumat' => 'Jumat', 'Sabtu' => 'Sabtu'], 'rules' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu'],
            ['name' => 'jam_mulai', 'label' => 'Jam Mulai', 'type' => 'time', 'rules' => 'required|date_format:H:i'],
            ['name' => 'jam_selesai', 'label' => 'Jam Selesai', 'type' => 'time', 'rules' => 'required|date_format:H:i|after:jam_mulai'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_jadwal_afri as jd')
            ->join('t_kelas_afri as k', 'k.id', '=', 'jd.kelas_id')
            ->join('t_pelajaran_afri as p', 'p.id', '=', 'jd.pelajaran_id')
            ->join('t_guru_afri as g', 'g.id', '=', 'jd.guru_id')
            ->select('jd.*', 'k.nama_kelas', 'p.nama_pelajaran', 'g.nama_guru')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('k.nama_kelas', 'like', "%{$cari}%")
                    ->orWhere('p.nama_pelajaran', 'like', "%{$cari}%")
                    ->orWhere('g.nama_guru', 'like', "%{$cari}%")
                    ->orWhere('jd.hari', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('jadwal_afri', compact('data', 'cari'));
    }
}
