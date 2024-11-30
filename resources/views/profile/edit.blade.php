@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg max-w-4xl mx-auto">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
            <span class="text-sm text-gray-500">Leave blank to keep the current password</span>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <div class="mb-4">
            <label for="avatar" class="block text-sm font-medium text-gray-700">Profile Picture</label>
            <input type="file" id="avatar" name="avatar" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
            @if($user->avatar)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profile Picture" class="w-32 h-32 rounded-full border-4 border-gray-300 object-cover">
            </div>
            @else
            <div class="mt-2">
                <img src="{{ asset('storage/avatars/default-avatar.png') }}" alt="Default Profile Picture" class="w-32 h-32 rounded-full border-4 border-gray-300 object-cover">
            </div>
            @endif
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 transition duration-300 ease-in-out">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection