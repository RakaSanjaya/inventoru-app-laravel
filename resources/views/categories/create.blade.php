@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block font-bold">Category Name</label>
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
                class="border rounded w-full px-4 py-2">{{ old('description') }}</textarea>
        </div>
        <div class="flex items-center gap-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
                Save
            </button>
            <a href="{{route('categories.index')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Back</a>
        </div>
    </form>
</div>
@endsection