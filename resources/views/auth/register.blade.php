@extends('layouts.landingpage')

@section('title', 'Register')

@section('content')
<div class="bg-white p-8 rounded shadow-md w-96">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h2>
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
            <input type="text" id="name" name="name" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('name') }}" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" value="{{ old('email') }}" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-500">Register</button>
    </form>
    <p class="text-sm text-center text-gray-600 mt-6">
        Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
    </p>
</div>
@endsection