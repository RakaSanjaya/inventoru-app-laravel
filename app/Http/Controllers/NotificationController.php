<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Menampilkan semua notifikasi yang belum dihapus
    public function index()
    {
        $notifications = Notification::where('is_deleted', false)::paginate(10);
        return view('notifications.index', compact('notifications'));
    }

    // Menandai notifikasi sebagai dibaca
    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        return redirect()->route('notifications.index')->with('success', 'Notifikasi berhasil dibaca');
    }

    // Menghapus notifikasi
    public function delete($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->is_deleted = true;
        $notification->save();

        return redirect()->route('notifications.index')->with('success', 'Notifikasi berhasil dihapus');
    }

    // Menambahkan notifikasi baru
    public function store($message)
    {
        Notification::create([
            'message' => $message
        ]);
    }
}
