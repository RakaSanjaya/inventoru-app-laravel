@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Your Profile</h1>

    <div class="flex items-center space-x-6 mb-6">
        <img src="{{ Auth::user()->avatar ? asset('storage/' . Auth::user()->avatar) : 'https://via.placeholder.com/150' }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-gray-300 object-cover">
        <div>
            <h2 class="text-2xl font-medium text-gray-800">{{ Auth::user()->name }}</h2>
            <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700">Full Name:</span>
            <span class="text-gray-800">{{ Auth::user()->name }}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700">Email:</span>
            <span class="text-gray-800">{{ Auth::user()->email }}</span>
        </div>
        <div class="flex justify-between items-center">
            <span class="font-medium text-gray-700">Phone:</span>
            <span class="text-gray-800">{{ Auth::user()->phone ?? 'No phone number' }}</span>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 transition duration-300 ease-in-out">
            Edit Profile
        </a>
    </div>
</div>
@endsection