@extends('layouts.landingpage')

@section('title', 'Login')

@section('content')
<div class="bg-white p-6 rounded w-96 shadow">
    <h1 class="text-2xl font-bold mb-4">Login</h1>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
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
            <label for="email" class="block font-bold">Email</label>
            <input type="email" id="email" name="email" class="border rounded w-full px-4 py-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block font-bold">Password</label>
            <input type="password" id="password" name="password" class="border rounded w-full px-4 py-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Login
        </button>
    </form>
    <p class="text-sm text-center text-gray-600 mt-6">
        Don't have an account? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Register</a>
    </p>
</div>
@endsection