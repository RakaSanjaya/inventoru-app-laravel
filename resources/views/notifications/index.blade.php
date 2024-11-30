@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Notifikasi</h1>

    @if(session('success'))
    <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded-lg shadow-md mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="space-y-4">
        @foreach ($notifications as $notification)
        <div class="bg-white p-4 rounded-lg shadow-md flex justify-between items-start">
            <div class="flex-1">
                <p class="text-gray-800 font-medium flex items-center">
                    @if (!$notification->is_read)
                    <span class="w-2.5 h-2.5 bg-yellow-600 rounded-full mr-2"></span>
                    @endif
                    {{ $notification->message }}
                </p>
                <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
            </div>
            <div class="flex flex-col items-end space-y-2">
                @if (!$notification->is_read)
                <span class="text-yellow-600 text-xs font-semibold bg-yellow-100 px-2 py-1 rounded-full">Belum dibaca</span>
                @else
                <span class="text-green-600 text-xs font-semibold bg-green-100 px-2 py-1 rounded-full">Sudah dibaca</span>
                @endif

                <div class="flex space-x-2">
                    <a href="{{ route('notifications.markAsRead', $notification->id) }}" class="bg-blue-500 text-white px-4 py-1 rounded-lg text-sm hover:bg-blue-700 transition-all duration-200">Tandai sebagai Dibaca</a>
                    <a href="{{ route('notifications.delete', $notification->id) }}" class="bg-red-500 text-white px-4 py-1 rounded-lg text-sm hover:bg-red-700 transition-all duration-200">Hapus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="w-full mt-6">
        {{ $notifications->links() }}
    </div>
</div>
@endsection