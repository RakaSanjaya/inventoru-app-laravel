@extends('layouts.app')

@section('title', 'History of Activities')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">History of Activities</h1>

    <!-- Tabel Aktivitas -->
    <table class="min-w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr>
                <th class="px-4 py-2 border">Aktifitas</th>
                <th class="px-4 py-2 border">Produk</th>
                <th class="px-4 py-2 border">Jumlah Perubahan</th>
                <th class="px-4 py-2 border">Deskripsi</th>
                <th class="px-4 py-2 border">Aktor</th>
                <th class="px-4 py-2 border">Waktu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historyActivities as $activity)
            <tr>
                <td class="px-4 py-2 border {{ $activity->getActivityTypeClass() }}">
                    {{ ucfirst(str_replace('_', ' ', $activity->activity_type)) }}
                </td>
                <td class="px-4 py-2 border">{{ $activity->product->name }}</td>
                <td class="px-4 py-2 border">{{ $activity->quantity_change }}</td>
                <td class="px-4 py-2 border">{{ $activity->description }}</td>
                <td class="px-4 py-2 border">{{ $activity->user->name }}</td>
                <td class="px-4 py-2 border">{{ $activity->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 