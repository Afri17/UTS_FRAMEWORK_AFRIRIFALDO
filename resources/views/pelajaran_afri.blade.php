@extends('layouts.layout_afri')
@section('judul', 'Data Pelajaran')
@section('isi')
<div class="bar">
    <form method="GET" action="/pelajaran" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari kode atau nama pelajaran...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/pelajaran" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/pelajaran/tambah" class="btn">+ Tambah Pelajaran</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>Kode</th><th>Nama Pelajaran</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->kode_pelajaran }}</td>
        <td>{{ $d->nama_pelajaran }}</td>
        @auth
        <td>
            <a href="/pelajaran/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/pelajaran/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
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
