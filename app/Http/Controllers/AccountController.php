<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    // Menampilkan semua akun pengguna
    public function index()
    {
        $users = User::all();
        return view('accounts.index', compact('users'));
    }

    // Menampilkan halaman detail akun pengguna
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.show', compact('user'));
    }

    // Menampilkan halaman form untuk mengedit akun pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.edit', compact('user'));
    }

    // Memperbarui data akun pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,admin',
        ]);

        // Update data user
        $user->update($request->only(['name', 'email', 'role']));

        // Redirect kembali dengan pesan sukses
        return redirect()->route('accounts.index')->with('success', 'Akun berhasil diperbarui.');
    }

    // Menghapus akun pengguna (opsional)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dihapus.');
    }
}
