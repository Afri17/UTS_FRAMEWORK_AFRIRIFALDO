@extends('layouts.layout_afri')
@section('judul', 'Data Jurusan')
@section('isi')
<div class="bar">
    <form method="GET" action="/jurusan" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari kode atau nama jurusan...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/jurusan" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/jurusan/tambah" class="btn">+ Tambah Jurusan</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>Kode</th><th>Nama Jurusan</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->kode_jurusan }}</td>
        <td>{{ $d->nama_jurusan }}</td>
        @auth
        <td>
            <a href="/jurusan/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/jurusan/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn kecil merah">Hapus</button>
            </form>
        </td>
        @endauth
    </tr>
    @empty
    <tr><td colspan="{{ 3 + (auth()->check() ? 1 : 0) }}" style="text-align:center">Data tidak ditemukan.</td></tr>
    @endforelse
</table>
@endsection
