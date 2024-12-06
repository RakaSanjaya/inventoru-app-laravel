@extends('layouts.app')

@section('title', 'Storage Locations')

@section('content')
<div class="mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Storage Location</h1>

    @if (session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
    <div>
        <a href="{{ route('locations.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500 transition duration-300 ease-in-out mb-6 inline-block">
            Add Storage Location
        </a>
    </div>
    @endif

    <table class="table-auto w-full mt-6 border-separate border-spacing-0.5">
        <thead class="bg-emerald-700 text-white text-center">
            <tr>
                <th class="px-6 py-3 text-sm font-medium">No</th>
                <th class="px-6 py-3 text-sm font-medium">Name</th>
                <th class="px-6 py-3 text-sm font-medium">Description</th>
                @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
                <th class="px-6 py-3 text-sm font-medium">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody class="bg-white">
            @forelse ($locations as $index => $location)
            <tr class="border-b hover:bg-gray-50 text-center transition duration-300 ease-in-out">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $location->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $location->description }}</td>

                @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('locations.edit', $location->id) }}" class="text-yellow-500 hover:text-yellow-400">Edit</a> |
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this location? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr class="bg-white text-center">
                <td colspan="{{ in_array(Auth::user()->role, ['super_admin', 'admin']) ? '4' : '3' }}" class="px-6 py-4 text-sm text-gray-500">
                    No storage locations available.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection