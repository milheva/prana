<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $orders = Order::where('user_id', Auth::id())
      ->with('items')
      ->latest()
      ->paginate(10);

    return view('orders.index', compact('orders'));
  }

  public function show(Order $order)
  {
    // Check ownership
    if ($order->user_id !== Auth::id()) {
      abort(403);
    }

    $order->load('items.product');

    return view('orders.show', compact('order'));
  }

  public function cancel(Order $order)
  {
    // Check ownership
    if ($order->user_id !== Auth::id()) {
      abort(403);
    }

    if (!$order->canBeCancelled()) {
      return redirect()->back()->with('error', 'Pesanan tidak dapat dibatalkan');
    }

    $order->update(['status' => 'cancelled']);

    // Restore product stock
    foreach ($order->items as $item) {
      $item->product->increment('stock', $item->quantity);
    }

    return redirect()->back()->with('success', 'Pesanan berhasil dibatalkan');
  }
}
