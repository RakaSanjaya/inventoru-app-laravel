@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Add New Product</h1>

    <!-- Pesan Konfirmasi -->
    @if(session('warning'))
    <div class="bg-yellow-100 border-t border-b border-yellow-400 text-yellow-700 px-4 py-3 mb-4">
        <p>{{ session('warning') }}</p>
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

    <!-- Formulir Produk -->
    <form id="product-form" action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-bold">Product Name</label>
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

        <!-- Category -->
        <div>
            <label for="category_id" class="block font-bold">Category</label>
            <select
                name="category_id"
                id="category_id"
                class="border rounded w-full px-4 py-2 @error('category_id') border-red-500 @enderror"
                required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Storage Location -->
        <div>
            <label for="storage_location_id" class="block font-bold">Storage Location</label>
            <select
                name="storage_location_id"
                id="storage_location_id"
                class="border rounded w-full px-4 py-2 @error('storage_location_id') border-red-500 @enderror"
                required>
                <option value="">Select Storage Location</option>
                @foreach ($storageLocations as $location)
                <option value="{{ $location->id }}" {{ old('storage_location_id') == $location->id ? 'selected' : '' }}>
                    {{ $location->name }}
                </option>
                @endforeach
            </select>
            @error('storage_location_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- SKU -->
        <div>
            <label for="sku" class="block font-bold">SKU</label>
            <input
                type="text"
                name="sku"
                id="sku"
                value="{{ old('sku') }}"
                class="border rounded w-full px-4 py-2 @error('sku') border-red-500 @enderror"
                required>
            @error('sku')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Stock -->
        <div>
            <label for="stock" class="block font-bold">Stock</label>
            <input
                type="number"
                name="stock"
                id="stock"
                value="{{ old('stock') }}"
                class="border rounded w-full px-4 py-2 @error('stock') border-red-500 @enderror"
                min="0"
                required>
            @error('stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block font-bold">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                value="{{ old('price') }}"
                class="border rounded w-full px-4 py-2 @error('price') border-red-500 @enderror"
                step="0.01"
                min="0"
                required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
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

        <!-- Submit Button -->
        <button type="submit" id="submit-button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Save Product
        </button>
        <a href="{{route('products.index')}}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">Back</a>
    </form>
</div>
@endsection