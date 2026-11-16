<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

abstract class CrudControllerAfri extends Controller
{
    protected string $table;
    protected string $slug;
    protected string $judul;

    abstract protected function fields(): array;

    protected function olah(array $data): array
    {
        return $data;
    }

    private function siapkanFields(): array
    {
        return array_map(function ($f) {
            if (($f['type'] ?? '') === 'select') {
                $f['pilihan'] = $f['opsi']
                    ?? DB::table($f['dari'][0])->orderBy('id')->pluck($f['dari'][1], 'id')->toArray();
            }
            return $f;
        }, $this->fields());
    }

    private function aturan(): array
    {
        $rules = [];
        foreach ($this->fields() as $f) {
            $rules[$f['name']] = $f['rules'];
        }
        return $rules;
    }

    private function tampilForm($row, string $action)
    {
        return view('form_afri', [
            'judul'  => $this->judul,
            'slug'   => $this->slug,
            'fields' => $this->siapkanFields(),
            'row'    => $row,
            'action' => $action,
        ]);
    }

    private function cari($id)
    {
        $row = DB::table($this->table)->where('id', $id)->first();
        abort_if(!$row, 404);
        return $row;
    }

    public function create()
    {
        return $this->tampilForm(null, url('/' . $this->slug));
    }

    public function store(Request $request)
    {
        $data = $this->olah($request->validate($this->aturan()));
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table($this->table)->insert($data);

        return redirect('/' . $this->slug)->with('sukses', 'Data ' . $this->judul . ' berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return $this->tampilForm($this->cari($id), url('/' . $this->slug . '/' . $id));
    }

    public function update(Request $request, $id)
    {
        $this->cari($id);
        $data = $this->olah($request->validate($this->aturan()));
        $data['updated_at'] = now();
        DB::table($this->table)->where('id', $id)->update($data);

        return redirect('/' . $this->slug)->with('sukses', 'Data ' . $this->judul . ' berhasil diubah.');
    }

    public function destroy($id)
    {
        $this->cari($id);
        DB::table($this->table)->where('id', $id)->delete();

        return redirect('/' . $this->slug)->with('sukses', 'Data ' . $this->judul . ' berhasil dihapus.');
    }
}
