<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
  /**
   * Get user's cart items
   */
  public function index(Request $request)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    $cartItems = Cart::with('product.category')
      ->where('user_id', $user->id)
      ->get();

    $subtotal = $cartItems->sum(function ($item) {
      return $item->quantity * $item->product->price;
    });

    return response()->json([
      'success' => true,
      'data' => [
        'items' => CartResource::collection($cartItems),
        'summary' => [
          'total_items' => $cartItems->count(),
          'total_quantity' => $cartItems->sum('quantity'),
          'subtotal' => $subtotal,
        ],
      ],
    ]);
  }

  /**
   * Add product to cart
   */
  public function store(Request $request)
  {
    $validated = $request->validate([
      'product_id' => 'required|exists:products,id',
      'quantity' => 'required|integer|min:1',
    ]);

    /** @var \App\Models\User $user */
    $user = $request->user();

    $product = Product::findOrFail($validated['product_id']);

    // Check if product is active
    if (!$product->is_active) {
      return response()->json([
        'success' => false,
        'message' => 'Produk tidak tersedia',
      ], 400);
    }

    // Check stock
    if ($product->stock < $validated['quantity']) {
      return response()->json([
        'success' => false,
        'message' => 'Stok tidak mencukupi',
        'data' => [
          'available_stock' => $product->stock,
        ],
      ], 400);
    }

    // Check if item already in cart
    $cartItem = Cart::where('user_id', $user->id)
      ->where('product_id', $product->id)
      ->first();

    if ($cartItem) {
      // Update quantity
      $newQuantity = $cartItem->quantity + $validated['quantity'];

      if ($product->stock < $newQuantity) {
        return response()->json([
          'success' => false,
          'message' => 'Stok tidak mencukupi',
          'data' => [
            'available_stock' => $product->stock,
            'current_cart_quantity' => $cartItem->quantity,
          ],
        ], 400);
      }

      $cartItem->update(['quantity' => $newQuantity]);
      $message = 'Jumlah produk di keranjang berhasil diupdate';
    } else {
      // Create new cart item
      $cartItem = Cart::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'quantity' => $validated['quantity'],
      ]);
      $message = 'Produk berhasil ditambahkan ke keranjang';
    }

    $cartItem->load('product.category');

    return response()->json([
      'success' => true,
      'message' => $message,
      'data' => new CartResource($cartItem),
    ], 201);
  }

  /**
   * Update cart item quantity
   */
  public function update(Request $request, Cart $cart)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Authorization check
    if ($cart->user_id !== $user->id) {
      return response()->json([
        'success' => false,
        'message' => 'Unauthorized',
      ], 403);
    }

    $validated = $request->validate([
      'quantity' => 'required|integer|min:1',
    ]);

    // Check stock
    if ($cart->product->stock < $validated['quantity']) {
      return response()->json([
        'success' => false,
        'message' => 'Stok tidak mencukupi',
        'data' => [
          'available_stock' => $cart->product->stock,
        ],
      ], 400);
    }

    $cart->update(['quantity' => $validated['quantity']]);
    $cart->load('product.category');

    return response()->json([
      'success' => true,
      'message' => 'Keranjang berhasil diupdate',
      'data' => new CartResource($cart),
    ]);
  }

  /**
   * Remove item from cart
   */
  public function destroy(Request $request, Cart $cart)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    // Authorization check
    if ($cart->user_id !== $user->id) {
      return response()->json([
        'success' => false,
        'message' => 'Unauthorized',
      ], 403);
    }

    $cart->delete();

    return response()->json([
      'success' => true,
      'message' => 'Produk berhasil dihapus dari keranjang',
    ]);
  }

  /**
   * Clear all cart items
   */
  public function clear(Request $request)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    Cart::where('user_id', $user->id)->delete();

    return response()->json([
      'success' => true,
      'message' => 'Keranjang berhasil dikosongkan',
    ]);
  }

  /**
   * Get cart count
   */
  public function count(Request $request)
  {
    /** @var \App\Models\User $user */
    $user = $request->user();

    $count = Cart::where('user_id', $user->id)->count();

    return response()->json([
      'success' => true,
      'data' => [
        'count' => $count,
      ],
    ]);
  }
}
