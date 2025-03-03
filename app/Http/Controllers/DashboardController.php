<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Notification;
use App\Models\HistoryActivity;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::all()->count();
        $lowStockProducts = Product::where('stock', '<', 50)->count();
        $outOfStockProducts = Product::where('stock', 0)->count();

        $recentProducts = Product::all()->reverse()->take(5);
        $recentActivities = HistoryActivity::all()->reverse()->take(5);
        $notifications = Notification::latest()->take(3)->get();

        return view('dashboard.index', compact(
            'totalProducts',
            'lowStockProducts',
            'outOfStockProducts',
            'recentProducts',
            'recentActivities',
            'notifications',
        ));
    }
}
