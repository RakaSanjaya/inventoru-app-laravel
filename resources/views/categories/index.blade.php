@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Categories</h1>

    @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
    <a href="{{ route('categories.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500 transition duration-300 ease-in-out mb-6 inline-block">
        Add New Category
    </a>
    @endif

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-md mb-6">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-800 p-4 rounded-md mb-6">
        <strong>Error!</strong> {{ session('error') }}
    </div>
    @endif

    <table class="table-auto w-full mt-6 border-separate border-spacing-0.5">
        <thead class="bg-emerald-700 text-white">
            <tr>
                <th class="px-6 py-3 text-sm font-medium">No</th>
                <th class="px-6 py-3 text-sm font-medium">Name</th>
                <th class="px-6 py-3 text-sm font-medium">Description</th>
                @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
                <th class="px-6 py-3 text-sm font-medium">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $index => $category)
            <tr class="border-b bg-white hover:bg-gray-50 transition text-center duration-300 ease-in-out">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $category->name }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $category->description }}</td>

                @if(in_array(Auth::user()->role, ['super_admin', 'admin']))
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('categories.edit', $category->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this category? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-4">
                            Delete
                        </button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr class="bg-white">
                <td colspan="{{ in_array(Auth::user()->role, ['super_admin', 'admin']) ? '4' : '3' }}" class="px-6 py-4 text-center text-gray-500">
                    No categories available.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection