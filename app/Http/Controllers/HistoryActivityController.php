<?php

namespace App\Http\Controllers;

use App\Models\HistoryActivity;

class HistoryActivityController extends Controller
{
    public function index()
    {
        $historyActivities = HistoryActivity::all()->reverse();
        return view('history.index', compact('historyActivities'));
    }

    public function destroy($id)
    {
        $historyActivity = HistoryActivity::find($id);

        if ($historyActivity) {
            $historyActivity->delete();
            return redirect()->route('history.index')->with('success', 'Riwayat aktivitas berhasil dihapus.');
        }

        return redirect()->route('history.index')->with('error', 'Riwayat aktivitas tidak ditemukan.');
    }

    public function destroyAll()
    {
        HistoryActivity::truncate();

        return redirect()->route('history.index')->with('success', 'Semua riwayat aktivitas berhasil dihapus.');
    }
}
