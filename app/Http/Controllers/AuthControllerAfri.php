<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControllerAfri extends Controller
{
    public function formLogin()
    {
        return view('login_afri');
    }

    public function login(Request $request)
    {
        $kredensial = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            return redirect()->intended('/pelajaran')->with('sukses', 'Login berhasil. Selamat datang, admin.');
        }

        return back()->withErrors(['email' => 'Email atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/pelajaran')->with('sukses', 'Anda sudah logout.');
    }
}
