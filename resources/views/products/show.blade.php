@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
<div class="bg-white p-6 rounded shadow-lg max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-6">Product Details</h1>

    <table class="min-w-full bg-white table-auto border-collapse">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-6 py-3 text-sm font-semibold text-gray-700">Field</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-700">Details</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-600">Name</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $product->name }}</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-600">Category</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $product->category->name ?? 'No Category' }}</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-600">SKU</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $product->sku }}</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-600">Stock</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $product->stock }}</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-600">Price</td>
                <td class="px-6 py-4 text-sm text-gray-900">${{ number_format($product->price, 2) }}</td>
            </tr>
            <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4 text-sm font-medium text-gray-600">Description</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $product->description ?? 'No description available' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="mt-6 flex justify-between items-center">
        <a href="{{ route('products.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-500 transition duration-300 ease-in-out">
            Back to Products
        </a>

        <!-- Optional: Add action buttons (like edit or delete) -->
        <div class="space-x-4">
            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-400 transition duration-300 ease-in-out">
                Edit
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500 transition duration-300 ease-in-out">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection