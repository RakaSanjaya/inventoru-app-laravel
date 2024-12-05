@extends('layouts.app')

@section('title', 'Mengatur Stok Produk')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Ubah Stok</h1>

    <form action="{{ route('products.adjustStock', $product->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-lg">
        @csrf
        <div class="flex flex-col space-y-4">
            <!-- Quantity Input -->
            <div class="flex flex-col space-y-2">
                <label for="quantity" class="text-sm font-medium text-gray-700">Jumlah Stok</label>
                <input type="number" name="quantity" id="quantity" placeholder="Masukkan jumlah stok"
                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required min="1">
                @error('quantity')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Type Dropdown -->
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
        </div>

        <div class="mt-6 flex justify-end space-x-4">
            <!-- Back Button -->
            <a href="{{ route('products.index') }}" class="py-3 px-6 bg-red-600 text-white text-sm font-medium rounded-md shadow-md hover:bg-red-300 transition duration-300 text-center">
                Kembali
            </a>
            <!-- Save Button -->
            <button type="submit" class="py-3 px-6 bg-blue-600 text-white text-sm font-medium rounded-md shadow-md hover:bg-blue-700 transition duration-300">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection