<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Auth::attempt akan otomatis mengecek email & password (sudah termasuk Hash::check)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Keamanan ekstra untuk session

            // Arahkan ke blog.index setelah berhasil login
            return redirect()->intended(route('blog.index'));
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}