@extends('layouts.layout_afri')
@section('judul', 'Data Kurikulum')
@section('isi')
<div class="bar">
    <form method="GET" action="/kurikulum" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari kode, nama, tahun, atau keterangan...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/kurikulum" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/kurikulum/tambah" class="btn">+ Tambah Kurikulum</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>Kode</th><th>Nama Kurikulum</th><th>Tahun</th><th>Keterangan</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->kode_kurikulum }}</td>
        <td>{{ $d->nama_kurikulum }}</td>
        <td>{{ $d->tahun }}</td>
        <td>{{ $d->keterangan }}</td>
        @auth
        <td>
            <a href="/kurikulum/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/kurikulum/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn kecil merah">Hapus</button>
            </form>
        </td>
        @endauth
    </tr>
    @empty
    <tr><td colspan="{{ 5 + (auth()->check() ? 1 : 0) }}" style="text-align:center">Data tidak ditemukan.</td></tr>
    @endforelse
</table>
@endsection
