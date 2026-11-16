<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class GuruControllerAfri extends CrudControllerAfri
{
    protected string $table = 't_guru_afri';
    protected string $slug = 'guru';
    protected string $judul = 'Guru';

    protected function fields(): array
    {
        return [
            ['name' => 'nip', 'label' => 'NIP', 'type' => 'text', 'rules' => 'required|string|max:20'],
            ['name' => 'nama_guru', 'label' => 'Nama Guru', 'type' => 'text', 'rules' => 'required|string|max:100'],
        ];
    }

    public function index()
    {
        $cari = trim((string) request('cari'));

        $data = DB::table('t_guru_afri')
            ->when($cari !== '', function ($query) use ($cari) {
                $query->where(function ($q) use ($cari) {
                    $q->where('nip', 'like', "%{$cari}%")
                    ->orWhere('nama_guru', 'like', "%{$cari}%");
                });
            })
            ->get();

        return view('guru_afri', compact('data', 'cari'));
    }
}
