<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul') - Afri</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f9; }
        nav { background: #2c3e50; padding: 12px 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; }
        nav a { color: #fff; text-decoration: none; margin-right: 15px; font-size: 14px; }
        nav a:hover { text-decoration: underline; }
        .akun { color: #fff; font-size: 14px; }
        .akun a { margin-right: 0; }
        .link { background: none; border: none; color: #ffd166; cursor: pointer; font-size: 14px; padding: 0; margin-left: 10px; }
        .link:hover { text-decoration: underline; }
        .container { padding: 20px; }
        h1 { color: #2c3e50; }
        table { border-collapse: collapse; width: 100%; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 8px 12px; text-align: left; }
        th { background: #2c3e50; color: #fff; }
        tr:nth-child(even) { background: #f2f2f2; }
        tr:hover { background: #e8f0fe; }
        .btn { display: inline-block; background: #2c3e50; color: #fff; padding: 8px 14px; border: none; border-radius: 4px; text-decoration: none; font-size: 14px; cursor: pointer; }
        .btn:hover { background: #3d566e; }
        .btn.kecil { padding: 4px 10px; font-size: 13px; }
        .btn.merah { background: #c0392b; }
        .btn.merah:hover { background: #e74c3c; }
        .btn.abu { background: #7f8c8d; }
        .bar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 15px; }
        .cari { display: flex; gap: 6px; flex-wrap: wrap; }
        .cari input[type=text] { padding: 8px 12px; border: 1px solid #bbb; border-radius: 4px; font-size: 14px; width: 280px; max-width: 100%; }
        .info { color: #555; font-size: 14px; margin: 0 0 12px; }
        .sukses { background: #d4edda; color: #155724; padding: 10px 14px; border-radius: 4px; margin-bottom: 15px; }
        .error { color: #c0392b; font-size: 13px; }
        .form { background: #fff; padding: 20px; max-width: 520px; border: 1px solid #ddd; border-radius: 4px; }
        .baris { margin-bottom: 14px; }
        .baris label { display: block; margin-bottom: 4px; font-weight: bold; font-size: 14px; color: #2c3e50; }
        .baris input, .baris select, .baris textarea { width: 100%; padding: 8px; border: 1px solid #bbb; border-radius: 4px; box-sizing: border-box; font-size: 14px; }
    </style>
</head>
<body>
    <nav>
        <div>
            <a href="/siswa">Siswa</a>
            <a href="/guru">Guru</a>
            <a href="/jurusan">Jurusan</a>
            <a href="/pelajaran">Pelajaran</a>
            <a href="/kurikulum">Kurikulum</a>
            <a href="/kelas">Kelas</a>
            <a href="/jadwal">Jadwal</a>
            <a href="/nilai">Nilai</a>
        </div>
        <div class="akun">
            @auth
                Admin: {{ auth()->user()->name }}
                <form action="/logout" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="link">Logout</button>
                </form>
            @else
                <a href="/login">Login Admin</a>
            @endauth
        </div>
    </nav>
    <div class="container">
        @if(session('sukses'))
            <div class="sukses">{{ session('sukses') }}</div>
        @endif
        <h1>@yield('judul')</h1>
        @yield('isi')
    </div>
</body>
</html>
