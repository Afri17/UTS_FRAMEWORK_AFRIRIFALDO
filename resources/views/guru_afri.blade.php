@extends('layouts.layout_afri')
@section('judul', 'Data Guru')
@section('isi')
<div class="bar">
    <form method="GET" action="/guru" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari NIP atau nama guru...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/guru" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/guru/tambah" class="btn">+ Tambah Guru</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>NIP</th><th>Nama Guru</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->nip }}</td>
        <td>{{ $d->nama_guru }}</td>
        @auth
        <td>
            <a href="/guru/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/guru/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
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
