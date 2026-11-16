<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Afri</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center;
            font-family: Arial, sans-serif; background: linear-gradient(135deg, #2c3e50, #4a6785); padding: 20px;
        }
        .kartu { width: 100%; max-width: 400px; background: #fff; border-radius: 10px; box-shadow: 0 10px 30px rgba(0, 0, 0, .25); overflow: hidden; }
        .kepala { background: #2c3e50; color: #fff; text-align: center; padding: 26px 20px; }
        .kepala h1 { margin: 0 0 6px; font-size: 24px; }
        .kepala p { margin: 0; font-size: 13px; color: #cfd8e3; }
        .isi { padding: 26px 28px 28px; }
        .baris { margin-bottom: 18px; }
        label { display: block; margin-bottom: 6px; font-size: 14px; font-weight: bold; color: #2c3e50; }
        input[type=email], input[type=password], input[type=text] {
            width: 100%; padding: 11px 12px; border: 1px solid #c5cdd6; border-radius: 6px; font-size: 15px; outline: none;
        }
        input:focus { border-color: #2c3e50; box-shadow: 0 0 0 3px rgba(44, 62, 80, .15); }
        .tampil { display: flex; align-items: center; gap: 6px; font-size: 13px; color: #555; margin-top: 8px; font-weight: normal; cursor: pointer; }
        .error { background: #fdecea; color: #b3261e; border: 1px solid #f5c2be; padding: 10px 12px; border-radius: 6px; font-size: 13px; margin-bottom: 18px; }
        .tombol { width: 100%; padding: 12px; background: #2c3e50; color: #fff; border: none; border-radius: 6px; font-size: 15px; font-weight: bold; cursor: pointer; }
        .tombol:hover { background: #3d566e; }
        .kembali { display: block; text-align: center; margin-top: 16px; font-size: 13px; color: #2c3e50; text-decoration: none; }
        .kembali:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="kartu">
        <div class="kepala">
            <h1>Login Admin</h1>
            <p>Masuk untuk menambah dan mengubah data</p>
        </div>
        <div class="isi">
            @if($errors->any())
                <div class="error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="/login">
                @csrf
                <div class="baris">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@afri.com" required autofocus>
                </div>
                <div class="baris">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    <label class="tampil">
                        <input type="checkbox" onclick="document.getElementById('password').type = this.checked ? 'text' : 'password'">
                        Tampilkan password
                    </label>
                </div>
                <button type="submit" class="tombol">Login</button>
            </form>

            <a href="/pelajaran" class="kembali">&larr; Kembali ke halaman data</a>
        </div>
    </div>
</body>
</html>
