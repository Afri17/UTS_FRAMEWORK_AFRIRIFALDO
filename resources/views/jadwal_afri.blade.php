@extends('layouts.layout_afri')
@section('judul', 'Data Jadwal')
@section('isi')
<div class="bar">
    <form method="GET" action="/jadwal" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari kelas, pelajaran, guru, atau hari...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/jadwal" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/jadwal/tambah" class="btn">+ Tambah Jadwal</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>Kelas</th><th>Pelajaran</th><th>Guru</th><th>Hari</th><th>Mulai</th><th>Selesai</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->nama_kelas }}</td>
        <td>{{ $d->nama_pelajaran }}</td>
        <td>{{ $d->nama_guru }}</td>
        <td>{{ $d->hari }}</td>
        <td>{{ $d->jam_mulai }}</td>
        <td>{{ $d->jam_selesai }}</td>
        @auth
        <td>
            <a href="/jadwal/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/jadwal/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn kecil merah">Hapus</button>
            </form>
        </td>
        @endauth
    </tr>
    @empty
    <tr><td colspan="{{ 7 + (auth()->check() ? 1 : 0) }}" style="text-align:center">Data tidak ditemukan.</td></tr>
    @endforelse
</table>
@endsection
