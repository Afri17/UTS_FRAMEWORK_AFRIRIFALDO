<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PelajaranControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_pelajaran_afri';
    protected string $slug = 'pelajaran';
    protected string $judul = 'Pelajaran';

    protected function fields(): array
    {
        return [
            ['name' => 'kode_pelajaran', 'label' => 'Kode Pelajaran', 'type' => 'text', 'rules' => 'required|string|max:10'],
            ['name' => 'nama_pelajaran', 'label' => 'Nama Pelajaran', 'type' => 'text', 'rules' => 'required|string|max:100'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_pelajaran_afri')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('kode_pelajaran', 'like', "%{$cari}%")
                    ->orWhere('nama_pelajaran', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('pelajaran_afri', compact('data', 'cari'));
    }
}
