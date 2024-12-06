@extends('layouts.landingpage')

@section('title', 'Login')

@section('content')
<div class="max-h-screen my-20 flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg w-full max-w-md shadow-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Login</h1>
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="border rounded-lg w-full px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="border rounded-lg w-full px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500 transition duration-200">
                Login
            </button>
        </form>
        <p class="text-sm text-center text-gray-600 mt-6">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
        </p>
    </div>
</div>
@endsection