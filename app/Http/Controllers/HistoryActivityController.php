<?php

namespace App\Http\Controllers;

use App\Models\HistoryActivity;
use Illuminate\Http\Request;

class HistoryActivityController extends Controller
{
    public function index()
    {
        $historyActivities = HistoryActivity::all()->reverse();
        return view('history.index', compact('historyActivities'));
    }

    // Method to delete a specific history activity
    public function destroy($id)
    {
        $historyActivity = HistoryActivity::find($id);

        if ($historyActivity) {
            $historyActivity->delete();
            return redirect()->route('history.index')->with('success', 'Riwayat aktivitas berhasil dihapus.');
        }

        return redirect()->route('history.index')->with('error', 'Riwayat aktivitas tidak ditemukan.');
    }

    // Method to delete all history activities
    public function destroyAll()
    {
        HistoryActivity::truncate(); // This will delete all records from the table

        return redirect()->route('history.index')->with('success', 'Semua riwayat aktivitas berhasil dihapus.');
    }
}
