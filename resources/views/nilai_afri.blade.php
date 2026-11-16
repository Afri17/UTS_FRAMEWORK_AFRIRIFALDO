@extends('layouts.layout_afri')
@section('judul', 'Data Nilai')
@section('isi')
<div class="bar">
    <form method="GET" action="/nilai" class="cari">
        <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari NIS, nama siswa, atau pelajaran...">
        <button type="submit" class="btn">Cari</button>
        @if($cari !== '')
            <a href="/nilai" class="btn abu">Reset</a>
        @endif
    </form>
    @auth
    <a href="/nilai/tambah" class="btn">+ Tambah Nilai</a>
    @endauth
</div>
@if($cari !== '')
<p class="info">Hasil pencarian untuk: <b>{{ $cari }}</b> ({{ count($data) }} data ditemukan)</p>
@endif
<table>
    <tr><th>No</th><th>NIS</th><th>Nama Siswa</th><th>Pelajaran</th><th>Tugas</th><th>UTS</th><th>UAS</th><th>Nilai Akhir</th>@auth<th>Aksi</th>@endauth</tr>
    @forelse($data as $d)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $d->nis }}</td>
        <td>{{ $d->nama_siswa }}</td>
        <td>{{ $d->nama_pelajaran }}</td>
        <td>{{ $d->tugas }}</td>
        <td>{{ $d->uts }}</td>
        <td>{{ $d->uas }}</td>
        <td>{{ $d->nilai_akhir }}</td>
        @auth
        <td>
            <a href="/nilai/{{ $d->id }}/edit" class="btn kecil">Edit</a>
            <form action="/nilai/{{ $d->id }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn kecil merah">Hapus</button>
            </form>
        </td>
        @endauth
    </tr>
    @empty
    <tr><td colspan="{{ 8 + (auth()->check() ? 1 : 0) }}" style="text-align:center">Data tidak ditemukan.</td></tr>
    @endforelse
</table>
@endsection
