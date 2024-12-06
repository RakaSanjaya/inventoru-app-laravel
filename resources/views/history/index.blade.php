@extends('layouts.app')

@section('title', 'History of Activities')

@section('content')
<div class="container mx-auto my-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">History of Activities</h1>

    @if(Auth::user()->role == 'super_admin')
    <form id="delete-all-form" action="{{ route('history.destroyAll') }}" method="POST" class="mb-4">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="px-6 py-3 rounded-lg text-sm transition-colors 
                        {{ $historyActivities->isEmpty() ? 'bg-gray-400 text-gray-200 cursor-not-allowed' : 'bg-red-600 text-white hover:bg-red-500' }}"
            {{ $historyActivities->isEmpty() ? 'disabled' : '' }}>
            Hapus Semua Riwayat
        </button>
    </form>
    @endif

    <table class="min-w-full table-auto border-collapse border  border-gray-200 text-sm">
        <thead class="bg-emerald-700 text-white">
            <tr>
                @foreach (['Aktifitas', 'Produk', 'Jumlah Perubahan', 'Deskripsi', 'Aktor', 'Waktu'] as $header)
                <th class="px-4 py-2 border text-center">{{ $header }}</th>
                @endforeach
                @if(Auth::user()->role == 'super_admin')
                <th class="px-4 py-2 border text-center">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse ($historyActivities as $activity)
            <tr class="bg-white">
                <td class="px-4 py-2 border {{ $activity->getActivityTypeClass() }} font-bold text-center">
                    {{ ucfirst(str_replace('_', ' ', $activity->activity_type)) }}
                </td>

                <td class="px-4 py-2 border text-center">{{ $activity->name_product }}</td>
                <td class="px-4 py-2 border text-center">{{ $activity->quantity_change }}</td>
                <td class="px-4 py-2 border text-center">{{ $activity->description }}</td>
                <td class="px-4 py-2 border text-center">{{ $activity->actor }}</td>
                <td class="px-4 py-2 border text-center">
                    {{ $activity->created_at->format('Y-m-d H:i') }}
                </td>

                @if(Auth::user()->role == 'super_admin')
                <td class="px-4 py-2 border text-center">
                    <form action="{{ route('history.destroy', $activity->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-500 transition-colors">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="7" class="px-4 py-2 border text-center text-gray-500">Tidak ada riwayat aktivitas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@section('scripts')
<script>
    // Konfirmasi penghapusan semua riwayat aktivitas
    document.getElementById('delete-all-form').addEventListener('submit', function(event) {
        if (!confirm('Apakah Anda yakin ingin menghapus semua riwayat aktivitas?')) {
            event.preventDefault(); // Mencegah form dikirim jika pengguna membatalkan
        }
    });

    // Konfirmasi penghapusan riwayat per baris
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!confirm('Apakah Anda yakin ingin menghapus riwayat ini?')) {
                event.preventDefault(); // Mencegah form dikirim jika pengguna membatalkan
            }
        });
    });
</script>
@endsection

@endsection