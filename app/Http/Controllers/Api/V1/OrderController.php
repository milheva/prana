<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderCollection;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  /**
   * Get user's orders
   */
  public function index(Request $request)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    $query = Order::with(['items.product', 'user'])
      ->where('user_id', $user->id);

    // Status filter
    if ($request->has('status')) {
      $query->where('status', $request->status);
    }

    // Date range filter
    if ($request->has('start_date')) {
      $query->whereDate('created_at', '>=', $request->start_date);
    }
    if ($request->has('end_date')) {
      $query->whereDate('created_at', '<=', $request->end_date);
    }

    // Sort
    $sortBy = $request->get('sort_by', 'created_at');
    $sortOrder = $request->get('sort_order', 'desc');
    $query->orderBy($sortBy, $sortOrder);

    // Pagination
    $perPage = $request->get('per_page', 10);
    $orders = $query->paginate($perPage);

    return new OrderCollection($orders);
  }

  /**
   * Get single order
   */
  public function show(Request $request, Order $order)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Authorization check
    if ($order->user_id !== $user->id && !$user->isAdmin()) {
      return response()->json([
        'success' => false,
        'message' => 'Unauthorized',
      ], 403);
    }

    $order->load(['items.product', 'user']);

    return new OrderResource($order);
  }

  /**
   * Create new order (checkout)
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'payment_method' => 'required|in:cod,bank_transfer,e_wallet',
      'shipping_name' => 'required|string|max:255',
      'shipping_phone' => 'required|string|max:20',
      'shipping_address' => 'required|string',
      'shipping_city' => 'required|string|max:100',
      'shipping_province' => 'required|string|max:100',
      'shipping_postal_code' => 'required|string|max:10',
      'notes' => 'nullable|string',
    ]);

    /** @var \App\Models\User $user */
    $user = $request->user();

    // Get cart items
    $cartItems = Cart::with('product')
      ->where('user_id', $user->id)
      ->get();

    if ($cartItems->isEmpty()) {
      return response()->json([
        'success' => false,
        'message' => 'Keranjang kosong',
      ], 400);
    }

    // Check stock availability
    foreach ($cartItems as $item) {
      if (!$item->product->is_active) {
        return response()->json([
          'success' => false,
          'message' => "Produk {$item->product->name} tidak tersedia",
        ], 400);
      }

      if ($item->product->stock < $item->quantity) {
        return response()->json([
          'success' => false,
          'message' => "Stok {$item->product->name} tidak mencukupi",
          'data' => [
            'product' => $item->product->name,
            'available_stock' => $item->product->stock,
            'requested_quantity' => $item->quantity,
          ],
        ], 400);
      }
    }

    DB::beginTransaction();

    try {
      // Calculate totals
      $subtotal = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->price;
      });

      // Simple shipping cost calculation (could be more complex)
      $shippingCost = $subtotal >= 500000 ? 0 : 25000;
      $total = $subtotal + $shippingCost;

      // Generate order number
      $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

      // Create order
      $order = Order::create([
        'user_id' => $user->id,
        'order_number' => $orderNumber,
        'status' => 'pending',
        'payment_method' => $validated['payment_method'],
        'payment_status' => 'unpaid',
        'subtotal' => $subtotal,
        'shipping_cost' => $shippingCost,
        'total' => $total,
        'shipping_name' => $validated['shipping_name'],
        'shipping_phone' => $validated['shipping_phone'],
        'shipping_address' => $validated['shipping_address'],
        'shipping_city' => $validated['shipping_city'],
        'shipping_province' => $validated['shipping_province'],
        'shipping_postal_code' => $validated['shipping_postal_code'],
        'notes' => $validated['notes'] ?? null,
      ]);

      // Create order items and update stock
      foreach ($cartItems as $item) {
        $order->items()->create([
          'product_id' => $item->product_id,
          'product_name' => $item->product->name,
          'product_sku' => $item->product->sku,
          'quantity' => $item->quantity,
          'price' => $item->product->price,
          'subtotal' => $item->quantity * $item->product->price,
        ]);

        // Update stock
        $item->product->decrement('stock', $item->quantity);
      }

      // Clear cart
      Cart::where('user_id', $user->id)->delete();

      DB::commit();

      $order->load(['items.product', 'user']);

      return response()->json([
        'success' => true,
        'message' => 'Pesanan berhasil dibuat',
        'data' => new OrderResource($order),
      ], 201);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([
        'success' => false,
        'message' => 'Gagal membuat pesanan: ' . $e->getMessage(),
      ], 500);
    }
  }

  /**
   * Cancel order
   */
  public function cancel(Request $request, Order $order)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Authorization check
    if ($order->user_id !== $user->id) {
      return response()->json([
        'success' => false,
        'message' => 'Unauthorized',
      ], 403);
    }

    // Check if order can be cancelled
    if (!$order->canBeCancelled()) {
      return response()->json([
        'success' => false,
        'message' => 'Pesanan tidak dapat dibatalkan',
      ], 400);
    }

    DB::beginTransaction();

    try {
      // Restore stock
      foreach ($order->items as $item) {
        $item->product->increment('stock', $item->quantity);
      }

      // Update order status
      $order->update([
        'status' => 'cancelled',
        'cancelled_at' => now(),
      ]);

      DB::commit();

      $order->load(['items.product', 'user']);

      return response()->json([
        'success' => true,
        'message' => 'Pesanan berhasil dibatalkan',
        'data' => new OrderResource($order),
      ]);
    } catch (\Exception $e) {
      DB::rollBack();

      return response()->json([
        'success' => false,
        'message' => 'Gagal membatalkan pesanan: ' . $e->getMessage(),
      ], 500);
    }
  }

  /**
   * Get order statistics
   */
  public function statistics(Request $request)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    $totalOrders = Order::where('user_id', $user->id)->count();
    $pendingOrders = Order::where('user_id', $user->id)
      ->whereIn('status', ['pending', 'processing', 'shipped'])
      ->count();
    $completedOrders = Order::where('user_id', $user->id)
      ->where('status', 'delivered')
      ->count();
    $totalSpent = Order::where('user_id', $user->id)
      ->where('status', 'delivered')
      ->sum('total');

    return response()->json([
      'success' => true,
      'data' => [
        'total_orders' => $totalOrders,
        'pending_orders' => $pendingOrders,
        'completed_orders' => $completedOrders,
        'total_spent' => $totalSpent,
      ],
    ]);
  }
}
