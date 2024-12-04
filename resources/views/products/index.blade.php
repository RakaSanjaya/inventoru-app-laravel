@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg max-w-6xl mx-auto">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Products</h1>

    <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500 transition duration-300 ease-in-out mb-4 inline-block">
        Add New Product
    </a>

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-md mb-6">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    <table class="table-auto w-full mt-6 border-collapse shadow-md rounded-md">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Name</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Category</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Stock</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Price</th>
                <th class="px-6 py-3 text-sm font-semibold text-gray-700 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="border-b hover:bg-gray-50 transition duration-300 ease-in-out">
                <td class="px-6 py-4 text-sm font-medium text-gray-900 text-center">
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:underline">{{ $product->name }}</a>
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 text-center">{{ $product->category ?? 'No Category' }}</td>
                <!-- Stock Column with Conditional Styling -->
                <td class="px-6 py-4 text-sm font-medium 
                    {{ $product->stock == 0 ? 'bg-red-100 text-red-800' : ($product->stock < 50 ? 'bg-yellow-100 text-yellow-800' : 'text-gray-800') }} text-center">
                    {{ $product->stock }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-800 text-center">
                    @php
                    $formattedPrice = "Rp " . number_format($product->price, 0, ',', '.');
                    @endphp
                    {{ $formattedPrice }}
                </td>
                <td class="px-6 py-4 text-sm text-center flex justify-center space-x-4">
                    <a href="{{ route('products.adjustStockForm', $product->id) }}" class="text-blue-500 hover:underline">Adjust Stock</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection