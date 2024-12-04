@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-4xl font-semibold text-gray-800 mb-8 text-center">Dashboard</h1>

    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
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

    <!-- Recent Products Table -->
    <div class="bg-white p-6 rounded-lg shadow-xl mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Produk Terbaru</h2>
        <table class="min-w-full table-auto text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-center">Nama Produk</th>
                    <th class="px-6 py-4 text-left text-center">Kategori</th>
                    <th class="px-6 py-4 text-left text-center">Lokasi Penyimpanan</th>
                    <th class="px-6 py-4 text-left text-center">Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentProducts as $product)
                <tr class="border-t hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-center">{{ $product->name }}</td>
                    <td class="px-6 py-4 text-center">{{ $product->category }}</td>
                    <td class="px-6 py-4 text-center">{{ $product->storage_location }}</td>
                    <td class="px-6 py-4 text-center">{{ $product->stock }}</td>
                </tr>
                @empty
                <tr class="border-t">
                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada data produk terbaru.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Recent Activities Table -->
    <div class="bg-white p-6 rounded-lg shadow-xl mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Riwayat Aktivitas</h2>
        <table class="min-w-full table-auto text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-4 text-left text-center">Produk</th>
                    <th class="px-6 py-4 text-left text-center">Aktivitas</th>
                    <th class="px-6 py-4 text-left text-center">Waktu</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentActivities as $activity)
                <tr class="border-t hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-center">{{ $activity->name_product }}</td>
                    <td class="px-6 py-4 text-center">{{ $activity->activity_type }}</td>
                    <td class="px-6 py-4 text-center">{{ $activity->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr class="border-t">
                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada riwayat aktivitas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Notifications Section -->
    <div class="bg-white p-6 rounded-lg shadow-xl">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Notifikasi</h2>
        @forelse ($notifications as $notification)
        <div class="bg-gray-50 p-4 rounded-lg shadow-md mb-6">
            <p class="text-gray-800">{{ $notification->message }}</p>
            <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
            <div class="flex justify-end mt-4">
                <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg text-sm hover:bg-blue-500 transition-colors">Tandai sebagai Dibaca</a>
                <a href="{{ route('notifications.delete', $notification->id) }}" class="bg-red-600 text-white px-6 py-2 rounded-lg text-sm ml-2 hover:bg-red-500 transition-colors">Hapus</a>
            </div>
        </div>
        @empty
        <div class="bg-gray-50 p-4 rounded-lg shadow-md">
            <p class="text-gray-500">Tidak ada notifikasi.</p>
        </div>
        @endforelse

        <!-- Pagination -->
        <div class="mt-6">
            {{ $notifications->links() }}
        </div>
    </div>
</div>
@endsection