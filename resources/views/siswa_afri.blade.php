@extends('layouts.layout_afri')
@section('judul', 'Data Siswa')
@section('isi')
<div class="bar">
    <form method="GET" action="/siswa" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari NIS atau nama siswa...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/siswa" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/siswa/tambah" class="btn">+ Tambah Siswa</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>NIS</th><th>Nama Siswa</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->nis }}</td>
        <td>{{ $d->nama_siswa }}</td>
        @auth
        <td>
            <a href="/siswa/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/siswa/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
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
