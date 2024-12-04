@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pengguna</h2>

    <!-- Pesan sukses atau error -->
    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @elseif(session('error'))
    <div class="bg-red-100 text-red-800 p-4 rounded-md mb-4">
        {{ session('error') }}
    </div>
    @endif

    <div class="overflow-x-auto shadow-md rounded-lg border border-gray-200">
        <table class="min-w-full table-auto text-sm">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4 border-b font-medium text-gray-700">Nama</th>
                    <th class="py-2 px-4 border-b font-medium text-gray-700">Email</th>
                    <th class="py-2 px-4 border-b font-medium text-gray-700">Role</th>
                    <th class="py-2 px-4 border-b font-medium text-gray-700 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="hover:bg-gray-50">
                    <td class="py-3 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-3 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-3 px-4 border-b capitalize">{{ $user->role }}</td>
                    <td class="py-3 px-4 border-b text-center">
                        <a href="{{ route('accounts.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-all">Edit</a>
                        <a href="{{ route('accounts.show', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-all ml-2">Detail</a>
                        <form action="{{ route('accounts.destroy', $user->id) }}" method="POST" style="display:inline;" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-all ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection