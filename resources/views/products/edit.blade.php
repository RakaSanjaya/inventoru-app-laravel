@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    @if(session('success'))
    <div class="bg-green-500 text-white p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if(session('warning'))
    <div class="bg-yellow-500 text-white p-4 mb-4 rounded">
        {{ session('warning') }}
    </div>
    @endif

    @if($errors->any())
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block font-bold">Product Name</label>
            <input
                type="text"
                name="name"
                id="name"
                value="{{ old('name', $product->name) }}"
                class="border rounded w-full px-4 py-2 @error('name') border-red-500 @enderror"
                required>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category" class="block font-bold">Category</label>
            <select
                name="category"
                id="category"
                class="border rounded w-full px-4 py-2 @error('category') border-red-500 @enderror"
                required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                <option
                    value="{{ $category->name }}"
                    {{ old('category', $product->category) == $category->name ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            @error('category')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="storage_location" class="block font-bold">Storage Location</label>
            <select
                name="storage_location"
                id="storage_location"
                class="border rounded w-full px-4 py-2 @error('storage_location') border-red-500 @enderror"
                required>
                <option value="">Select Storage Location</option>
                @foreach ($storageLocations as $storageLocation)
                <option
                    value="{{ $storageLocation->name }}"
                    {{ old('storage_location', $product->storage_location) == $storageLocation->name ? 'selected' : '' }}>
                    {{ $storageLocation->name }}
                </option>
                @endforeach
            </select>
            @error('storage_location')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="sku" class="block font-bold">SKU</label>
            <input
                type="text"
                name="sku"
                id="sku"
                value="{{ old('sku', $product->sku) }}"
                class="border rounded w-full px-4 py-2 @error('sku') border-red-500 @enderror"
                required>
            @error('sku')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock" class="block font-bold">Stock</label>
            <input
                type="number"
                name="stock"
                id="stock"
                value="{{ old('stock', $product->stock) }}"
                class="border rounded w-full px-4 py-2 @error('stock') border-red-500 @enderror"
                min="0"
                required>
            @error('stock')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block font-bold">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                value="{{ old('price', $product->price) }}"
                class="border rounded w-full px-4 py-2 @error('price') border-red-500 @enderror"
                step="0.01"
                min="0"
                required>
            @error('price')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-bold">Description</label>
            <textarea
                name="description"
                id="description"
                class="border rounded w-full px-4 py-2 @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-500">
            Update Product
        </button>

        <a href="{{ route('products.index') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">
            Back
        </a>

    </form>
</div>
@endsection