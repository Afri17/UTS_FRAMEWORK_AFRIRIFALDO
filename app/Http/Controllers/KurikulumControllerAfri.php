<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class KurikulumControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_kurikulum_afri';
    protected string $slug = 'kurikulum';
    protected string $judul = 'Kurikulum';

    protected function fields(): array
    {
        return [
            ['name' => 'kode_kurikulum', 'label' => 'Kode Kurikulum', 'type' => 'text', 'rules' => 'required|string|max:10'],
            ['name' => 'nama_kurikulum', 'label' => 'Nama Kurikulum', 'type' => 'text', 'rules' => 'required|string|max:100'],
            ['name' => 'tahun', 'label' => 'Tahun', 'type' => 'text', 'rules' => 'required|string|max:9'],
            ['name' => 'keterangan', 'label' => 'Keterangan', 'type' => 'textarea', 'rules' => 'nullable|string'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_kurikulum_afri')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('kode_kurikulum', 'like', "%{$cari}%")
                    ->orWhere('nama_kurikulum', 'like', "%{$cari}%")
                    ->orWhere('tahun', 'like', "%{$cari}%")
                    ->orWhere('keterangan', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('kurikulum_afri', compact('data', 'cari'));
    }
}
