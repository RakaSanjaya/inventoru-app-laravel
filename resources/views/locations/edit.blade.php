@extends('layouts.app')

@section('title', 'Edit Storage Location')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Edit Storage Location</h1>

    <!-- Error Handling -->
    @if ($errors->any())
    <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Edit Location Form -->
    <form action="{{ route('locations.update', $location->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name" class="block font-bold">Location Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $location->name) }}" class="border rounded w-full px-4 py-2" required>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block font-bold">Description</label>
            <textarea name="description" id="description" class="border rounded w-full px-4 py-2">{{ old('description', $location->description) }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">Update Location</button>
    </form>
</div>
@endsection