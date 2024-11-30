@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-4xl font-semibold text-gray-800 mb-8">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-xl transform transition-transform hover:scale-105 duration-300">
            <h2 class="text-xl font-semibold">Total Produk</h2>
            <p class="text-4xl mt-4">{{ $totalProducts }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-xl transform transition-transform hover:scale-105 duration-300">
            <h2 class="text-xl font-semibold">Produk Stok Rendah</h2>
            <p class="text-4xl mt-4">{{ $lowStockProducts }}</p>
        </div>
        <div class="bg-red-500 text-white p-6 rounded-lg shadow-xl transform transition-transform hover:scale-105 duration-300">
            <h2 class="text-xl font-semibold">Produk Habis</h2>
            <p class="text-4xl mt-4">{{ $outOfStockProducts }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-xl mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Produk Terbaru</h2>
        <table class="min-w-full table-auto text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left">Nama Produk</th>
                    <th class="px-6 py-4 text-left">Kategori</th>
                    <th class="px-6 py-4 text-left">Lokasi Penyimpanan</th>
                    <th class="px-6 py-4 text-left">Stok</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentProducts as $product)
                <tr class="border-t hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">{{ $product->category}}</td>
                    <td class="px-6 py-4">{{ $product->storage_location }}</td>
                    <td class="px-6 py-4">{{ $product->stock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-xl mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Riwayat Aktivitas</h2>
        <table class="min-w-full table-auto text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left">Produk</th>
                    <th class="px-6 py-4 text-left">Aktivitas</th>
                    <th class="px-6 py-4 text-left">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recentActivities as $activity)
                <tr class="border-t hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">{{ $activity->name_product }}</td>
                    <td class="px-6 py-4">{{ $activity->activity_type }}</td>
                    <td class="px-6 py-4">{{ $activity->created_at->diffForHumans() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-xl">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Notifikasi</h2>
        @foreach ($notifications as $notification)
        <div class="bg-gray-50 p-4 rounded-lg shadow-md mb-6">
            <p class="text-gray-800">{{ $notification->message }}</p>
            <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
            <div class="flex justify-end mt-4">
                <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-blue-500 transition-colors">Tandai sebagai Dibaca</a>
                <a href="{{ route('notifications.delete', $notification->id) }}" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm ml-2 hover:bg-red-500 transition-colors">Hapus</a>
            </div>
        </div>
        @endforeach

        <div class="mt-6">
            {{ $notifications->links() }}
        </div>
    </div>
</div>
@endsection