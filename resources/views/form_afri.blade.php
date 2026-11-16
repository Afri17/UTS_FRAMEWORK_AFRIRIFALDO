@extends('layouts.layout_afri')
@section('judul', ($row ? 'Edit ' : 'Tambah ') . 'Data ' . $judul)
@section('isi')
<form method="POST" action="{{ $action }}" class="form">
    @csrf
    @if($row)
        @method('PUT')
    @endif

    @foreach($fields as $f)
        @php
            $nilai = old($f['name'], $row?->{$f['name']} ?? '');
            if ($f['type'] === 'time') { $nilai = substr((string) $nilai, 0, 5); }
        @endphp
        <div class="baris">
            <label for="{{ $f['name'] }}">{{ $f['label'] }}</label>

            @if($f['type'] === 'select')
                <select id="{{ $f['name'] }}" name="{{ $f['name'] }}">
                    <option value="">-- Pilih --</option>
                    @foreach($f['pilihan'] as $k => $v)
                        <option value="{{ $k }}" @selected((string) $nilai === (string) $k)>{{ $v }}</option>
                    @endforeach
                </select>
            @elseif($f['type'] === 'textarea')
                <textarea id="{{ $f['name'] }}" name="{{ $f['name'] }}" rows="3">{{ $nilai }}</textarea>
            @else
                <input type="{{ $f['type'] }}" id="{{ $f['name'] }}" name="{{ $f['name'] }}" value="{{ $nilai }}">
            @endif

            @error($f['name'])<span class="error">{{ $message }}</span>@enderror
        </div>
    @endforeach

    <button type="submit" class="btn">Simpan</button>
    <a href="/{{ $slug }}" class="btn abu">Batal</a>
</form>
@endsection
