@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-xl font-semibold text-gray-800">{{ __('Akun Saya') }}</h3>
        </div>

        <div class="px-6 py-4">
            <!-- Detail Akun -->
            <h5 class="text-lg font-medium text-gray-700 mb-4">Detail Akun</h5>

            <div class="space-y-4">
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-600">Nama:</span>
                    <span class="text-gray-800">{{ $user->name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="font-semibold text-gray-600">Email:</span>
                    <span class="text-gray-800">{{ $user->email }}</span>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('accounts.edit') }}" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg text-center hover:bg-blue-500 transition-colors duration-300">
                    Edit Akun
                </a>
            </div>
        </div>
    </div>
</div>
@endsection