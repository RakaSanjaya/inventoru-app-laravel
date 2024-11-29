<?php

namespace App\Http\Controllers;

use App\Models\HistoryActivity;
use Illuminate\Http\Request;

class HistoryActivityController extends Controller
{
    public function index()
    {
        $historyActivities = HistoryActivity::with('user', 'product')->orderBy('created_at', 'desc')->get();
        return view('history.index', compact('historyActivities'));
    }
}
