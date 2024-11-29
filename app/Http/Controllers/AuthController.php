<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt($credentials)) {
            // Pengguna berhasil login, arahkan ke dashboard
            return redirect()->intended('dashboard');
        }

        // Jika login gagal
        return redirect('login')->withErrors('Email atau password salah');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Arahkan pengguna ke halaman login setelah registrasi berhasil
        return redirect('login')->with('success', 'Your account has been created. Please log in.');
    }

    public function dashboard()
    {
        // Periksa apakah pengguna terautentikasi
        if (Auth::check()) {
            return view('dashboard.index');
        }

        // Jika tidak terautentikasi, redirect ke halaman login
        return redirect('login')->withErrors('You are not allowed to access');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
