@extends('layouts.layout_afri')
@section('judul', 'Data Kelas')
@section('isi')
<div class="bar">
    <form method="GET" action="/kelas" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari kelas, jurusan, atau wali kelas...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/kelas" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/kelas/tambah" class="btn">+ Tambah Kelas</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>Kode</th><th>Nama Kelas</th><th>Jurusan</th><th>Wali Kelas</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->kode_kelas }}</td>
        <td>{{ $d->nama_kelas }}</td>
        <td>{{ $d->nama_jurusan }}</td>
        <td>{{ $d->nama_guru }}</td>
        @auth
        <td>
            <a href="/kelas/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/kelas/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
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
