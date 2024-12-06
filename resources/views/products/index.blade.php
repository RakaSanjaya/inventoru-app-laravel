@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Products</h1>

    @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
    <a href="{{ route('products.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-500 transition duration-300 ease-in-out mb-4 inline-block">
        Add New Product
    </a>
    @endif

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-800 p-4 rounded-md mb-6">
        <strong>Success!</strong> {{ session('success') }}
    </div>
    @endif

    <table class="table-auto w-full mt-6 border-collapse shadow-md rounded-md">
        <thead>
            <tr class="bg-emerald-700 text-white">
                <th class="px-6 py-3 text-sm font-semibold text-center">No</th> <!-- Added No column -->
                <th class="px-6 py-3 text-sm font-semibold text-center">Name</th>
                <th class="px-6 py-3 text-sm font-semibold text-center">Category</th>
                <th class="px-6 py-3 text-sm font-semibold text-center">Stock</th>
                <th class="px-6 py-3 text-sm font-semibold text-center">Price</th>
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
                <th class="px-6 py-3 text-sm font-semibold text-center">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
            <tr class=" bg-white hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-center">{{ $index + 1 }}</td> <!-- Display product number -->
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
                @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
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
                @endif
            </tr>
            @empty
            <tr class="bg-white">
                <td colspan="{{ auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin' ? '6' : '5' }}" class="px-6 py-4 text-center text-gray-500">
                    No products available.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection