<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class AccountController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('accounts.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('accounts.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,admin',
        ]);
        $user->update($request->only(['name', 'email', 'role']));
        return redirect()->route('accounts.index')->with('success', 'Akun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('accounts.index')->with('success', 'Akun berhasil dihapus.');
    }
}
