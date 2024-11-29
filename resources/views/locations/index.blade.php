@extends('layouts.app')

@section('title', 'Storage Locations')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Storage Locations</h1>

    <!-- Success Message -->
    @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Add Storage Location Button -->
    <div class="mb-4">
        <a href="{{ route('locations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Add Storage Location
        </a>
    </div>

    <!-- Locations Table -->
    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
            <tr>
                <td class="border px-4 py-2">{{ $location->name }}</td>
                <td class="border px-4 py-2">{{ $location->description }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('locations.edit', $location->id) }}" class="text-yellow-500 hover:text-yellow-400">Edit</a> |
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection