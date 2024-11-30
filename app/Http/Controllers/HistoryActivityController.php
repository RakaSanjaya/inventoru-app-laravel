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
}
