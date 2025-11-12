<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $carts = Cart::where('user_id', Auth::id())->with('product')->get();

    if ($carts->isEmpty()) {
      return redirect()->route('products.index')->with('error', 'Keranjang belanja kosong');
    }

    $subtotal = $carts->sum(function ($cart) {
      return $cart->product->final_price * $cart->quantity;
    });

    $shippingCost = 15000; // Fixed shipping cost for now
    $total = $subtotal + $shippingCost;

    return view('checkout.index', compact('carts', 'subtotal', 'shippingCost', 'total'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'shipping_name' => 'required|string|max:255',
      'shipping_phone' => 'required|string|max:20',
      'shipping_address' => 'required|string',
      'shipping_city' => 'required|string|max:100',
      'shipping_province' => 'required|string|max:100',
      'shipping_postal_code' => 'required|string|max:10',
      'payment_method' => 'required|in:cod,bank_transfer,ewallet',
      'notes' => 'nullable|string',
    ]);

    $carts = Cart::where('user_id', Auth::id())->with('product')->get();

    if ($carts->isEmpty()) {
      return redirect()->route('products.index')->with('error', 'Keranjang belanja kosong');
    }

    DB::beginTransaction();
    try {
      // Calculate totals
      $subtotal = $carts->sum(function ($cart) {
        return $cart->product->final_price * $cart->quantity;
      });
      $shippingCost = 15000;
      $total = $subtotal + $shippingCost;

      // Create order
      $order = Order::create([
        'user_id' => Auth::id(),
        'subtotal' => $subtotal,
        'shipping_cost' => $shippingCost,
        'total' => $total,
        'shipping_name' => $request->shipping_name,
        'shipping_phone' => $request->shipping_phone,
        'shipping_address' => $request->shipping_address,
        'shipping_city' => $request->shipping_city,
        'shipping_province' => $request->shipping_province,
        'shipping_postal_code' => $request->shipping_postal_code,
        'payment_method' => $request->payment_method,
        'notes' => $request->notes,
      ]);

      // Create order items
      foreach ($carts as $cart) {
        OrderItem::create([
          'order_id' => $order->id,
          'product_id' => $cart->product_id,
          'product_name' => $cart->product->name,
          'product_sku' => $cart->product->sku,
          'price' => $cart->product->final_price,
          'quantity' => $cart->quantity,
          'subtotal' => $cart->product->final_price * $cart->quantity,
        ]);

        // Update product stock
        $cart->product->decrement('stock', $cart->quantity);
      }

      // Clear cart
      Cart::where('user_id', Auth::id())->delete();

      DB::commit();

      return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil dibuat');
    } catch (\Exception $e) {
      DB::rollBack();
      return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
  }
}
