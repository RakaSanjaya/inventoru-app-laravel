@extends('layouts.app')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        <div class="bg-white shadow-md p-6 border-emerald-800 border-b-8">
            <h2 class="text-xl font-bold">Total Produk</h2>
            <p class="text-4xl mt-4 font-bold">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white shadow-md p-6 border-yellow-600 border-b-8">
            <h2 class="text-xl font-bold">Produk Stok Rendah</h2>
            <p class="text-4xl mt-4 font-bold">{{ $lowStockProducts }}</p>
        </div>
        <div class="bg-white shadow-md p-6 border-red-600 border-b-8">
            <h2 class="text-xl font-bold">Produk Habis</h2>
            <p class="text-4xl mt-4 font-bold">{{ $outOfStockProducts }}</p>
        </div>
    </div>
</div>

<div class="container mx-auto my-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Produk Terbaru</h2>
    <table class="min-w-full table-auto text-gray-700 bg-white">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-4 text-center bg-emerald-700 text-white">Nama Produk</th>
                <th class="px-6 py-4 text-center bg-emerald-700 text-white">Kategori</th>
                <th class="px-6 py-4 text-center bg-emerald-700 text-white">Lokasi Penyimpanan</th>
                <th class="px-6 py-4 text-center bg-emerald-700 text-white">Stok</th>
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
<div>
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Riwayat Aktivitas</h2>
    <table class="min-w-full table-auto text-gray-700 bg-white">
        <thead class="bg-emerald-700 text-white">
            <tr>
                <th class="px-6 py-4 text-center">Produk</th>
                <th class="px-6 py-4 text-center">Aktivitas</th>
                <th class="px-6 py-4 text-center">Waktu</th>
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

<div class="container mx-auto my-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-6">Notifikasi</h2>

    @forelse ($notifications as $notification)
    <div class="flex items-center justify-between border-l-4 border-emerald-700 align-middle bg-white py-5 px-4 mb-2 border-b-3">
        <div class="flex flex-col">
            <p class="text-gray-800 font-semibold">{{ $notification->message }}</p>
            <p class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
        </div>
        <div class="flex gap-4 justify-end align-middle items-center">
            @if (!$notification->is_read)
            <!-- If notification is unread, show the 'Mark as Read' button -->
            <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="bg-blue-600 text-white px-6 py-2 text-xs hover:bg-blue-500 transition-colors">Tandai Dibaca</a>
            @else
            <!-- If notification is read, show a different button or style -->
            <span class="bg-gray-400 text-white px-6 py-2 text-xs">Sudah Dibaca</span>
            @endif

            <a href="{{ route('notifications.delete', $notification->id) }}" class="bg-red-600 text-white rounded-full p-2 text-sm hover:bg-red-500 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </div>
    @empty
    <div class="bg-gray-50 p-4 rounded-lg shadow-md mb-10">
        <p class="text-gray-500">Tidak ada notifikasi.</p>
    </div>
    @endforelse
</div>


@endsection