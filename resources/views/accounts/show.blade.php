@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-xl font-semibold text-gray-800">Account - {{ $user->name }}</h3>
        </div>

        <div class="px-6 py-4">
            <h5 class="text-lg font-medium text-gray-700 mb-4">Detail Akun</h5>

            <div class="space-y-4">
                <!-- Foto Profil -->
                <div class="flex justify-center">
                    @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover border-2 border-gray-300">
                    @else
                    <img src="{{ asset('storage/avatar/default-avatar.png') }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover border-2 border-gray-300">
                    @endif
                </div>

                <div class="flex justify-between">
                    <span class="font-semibold text-gray-600">Nama:</span>
                    <span class="text-gray-800">{{ $user->name }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-semibold text-gray-600">Email:</span>
                    <span class="text-gray-800">{{ $user->email }}</span>
                </div>

                <div class="flex justify-between">
                    <span class="font-semibold text-gray-600">Phone:</span>
                    <span class="text-gray-800">{{ $user->phone }}</span>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('accounts.edit', $user->id) }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-500 transition-colors duration-300">
                    Edit Akun
                </a>

                <a href="{{ route('accounts.index') }}" class="w-full bg-gray-500 text-white py-2 px-4 rounded-lg text-center hover:bg-gray-400 transition-colors duration-300">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection