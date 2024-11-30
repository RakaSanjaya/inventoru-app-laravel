@extends('layouts.app')

@section('title', 'Add Storage Location')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Add New Storage Location</h1>

    @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('locations.store') }}" method="POST">
        @csrf

        <div>
            <label for="name" class="block font-bold">Storage Location Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name') }}"
                class="border rounded w-full px-4 py-2 @error('name') border-red-500 @enderror"
                required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-bold">Description</label>
            <textarea
                name="description"
                id="description"
                class="border rounded w-full px-4 py-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Save Storage Location
        </button>
    </form>
</div>
@endsection