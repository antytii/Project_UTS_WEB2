<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $role = $user->role;

        $message = $role === 'admin' 
            ? 'Berhasil login sebagai Admin' 
            : 'Berhasil login sebagai Pelanggan';

        return redirect()->route('home')->with('success', $message);
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
    }


    // Menampilkan halaman registrasi
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,user'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Optional: auto-login setelah register
        // Auth::login($user);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Anda telah logout.');
    }
}
