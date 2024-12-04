<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Fetch notifications ordered by creation date
        $notifications = Notification::orderBy('created_at', 'desc')->paginate(10);

        // Fetch the count of unread notifications
        $unreadCount = Notification::where('is_read', false)->count();

        // Pass the data to the view
        return view('notifications.index', compact('notifications', 'unreadCount'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);
        return redirect()->route('notifications.index')->with('success', 'Notifikasi berhasil dibaca');
    }

    public function delete($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();
        return redirect()->route('notifications.index')->with('success', 'Notifikasi berhasil dihapus');
    }

    public function store($message)
    {
        Notification::create(['message' => $message]);
    }
}
