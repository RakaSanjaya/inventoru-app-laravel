@extends('layouts.app')

@section('title', 'Mengatur Stok Produk')

@section('content')

<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Mengatur Stok Produk</h1>

    <!-- Form Pengaturan Stok -->
    <form action="{{ route('products.adjustStock', $product->id) }}" method="POST">
        @csrf
        <!-- Pilih apakah menambah atau mengurangi stok -->
        <div class="mb-4">
            <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="type" class="block text-sm font-medium text-gray-700">Tindakan</label>
            <select name="type" id="type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                <option value="stock_in">Tambah Stok</option>
                <option value="stock_out">Kurangi Stok</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
    </form>
</div>
@endsection