@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg max-w-6xl mx-auto">
    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Products</h1>

    <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500 transition duration-300 ease-in-out mb-4 inline-block">
        Add New Product
    </a>

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-md mb-6">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    <table class="table-auto w-full mt-6 border-separate border-spacing-0.5">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Name</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Category</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Stock</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Price</th>
                <th class="px-6 py-3 text-sm font-medium text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="border-b hover:bg-gray-50 transition duration-300 ease-in-out">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">
                    <a href="{{ route('products.show', $product->id) }}" class="text-blue-600 hover:underline">{{ $product->name }}</a>
                </td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $product->category   ?? 'No Category' }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">{{ $product->stock }}</td>
                <td class="px-6 py-4 text-sm text-gray-800">${{ number_format($product->price, 2) }}</td>
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('products.adjustStockForm', $product->id) }}" class="text-blue-500">Atur Stok</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline ml-4">
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