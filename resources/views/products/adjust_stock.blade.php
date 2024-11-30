@extends('layouts.app')

@section('title', 'Mengatur Stok Produk')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Mengatur Stok Produk</h1>

    <form action="{{ route('products.adjustStock', $product->id) }}" method="POST" class="space-y-6">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="quantity" class="text-sm font-medium text-gray-700">Jumlah Stok</label>
            <input type="number" name="quantity" id="quantity" placeholder="Masukkan jumlah stok"
                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                required min="1">
            @error('quantity')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col space-y-2">
            <label for="type" class="text-sm font-medium text-gray-700">Tindakan</label>
            <select name="type" id="type" class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                <option value="stock_in">Tambah Stok</option>
                <option value="stock_out">Kurangi Stok</option>
            </select>
            @error('type')
            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6 flex space-x-4">
            <button type="submit" class="w-full py-3 px-6 bg-blue-600 text-white text-lg font-medium rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                Simpan Perubahan
            </button>

            <a href="{{ route('products.index') }}" class="w-full py-3 px-6 bg-gray-200 text-gray-800 text-lg font-medium rounded-md shadow-md hover:bg-gray-300 transition duration-300 text-center">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection