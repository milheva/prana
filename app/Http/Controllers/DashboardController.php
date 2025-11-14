<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Get user's orders statistics
        $totalOrders = Order::where('user_id', $user->id)->count();
        $pendingOrders = Order::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
        $completedOrders = Order::where('user_id', $user->id)
            ->whereIn('status', ['delivered'])
            ->count();

        // Get total spending
        $totalSpent = Order::where('user_id', $user->id)
            ->whereIn('status', ['processing', 'shipped', 'delivered'])
            ->sum('total');

        // Get recent orders (last 5)
        $recentOrders = Order::where('user_id', $user->id)
            ->with('items.product')
            ->latest()
            ->take(5)
            ->get();

        // Get featured products for recommendation
        $featuredProducts = Product::where('is_featured', true)
            ->where('stock', '>', 0)
            ->take(4)
            ->get();

        return view('dashboard', compact(
            'user',
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalSpent',
            'recentOrders',
            'featuredProducts'
        ));
    }
}
