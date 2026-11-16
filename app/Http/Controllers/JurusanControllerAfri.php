<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class JurusanControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_jurusan_afri';
    protected string $slug = 'jurusan';
    protected string $judul = 'Jurusan';

    protected function fields(): array
    {
        return [
            ['name' => 'kode_jurusan', 'label' => 'Kode Jurusan', 'type' => 'text', 'rules' => 'required|string|max:10'],
            ['name' => 'nama_jurusan', 'label' => 'Nama Jurusan', 'type' => 'text', 'rules' => 'required|string|max:100'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_jurusan_afri')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('kode_jurusan', 'like', "%{$cari}%")
                    ->orWhere('nama_jurusan', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('jurusan_afri', compact('data', 'cari'));
    }
}
