<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function index()
  {
    $carts = $this->getCartItems();
    $subtotal = $carts->sum(function ($cart) {
      return $cart->product->final_price * $cart->quantity;
    });

    return view('cart.index', compact('carts', 'subtotal'));
  }

  public function add(Request $request, Product $product)
  {
    $request->validate([
      'quantity' => 'required|integer|min:1|max:' . $product->stock,
    ]);

    if (Auth::check()) {
      $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $product->id)
        ->first();

      if ($cart) {
        $cart->quantity += $request->quantity;
        $cart->save();
      } else {
        Cart::create([
          'user_id' => Auth::id(),
          'product_id' => $product->id,
          'quantity' => $request->quantity,
        ]);
      }
    } else {
      // For guest users, use session
      $sessionId = session()->getId();
      $cart = Cart::where('session_id', $sessionId)
        ->where('product_id', $product->id)
        ->first();

      if ($cart) {
        $cart->quantity += $request->quantity;
        $cart->save();
      } else {
        Cart::create([
          'session_id' => $sessionId,
          'product_id' => $product->id,
          'quantity' => $request->quantity,
        ]);
      }
    }

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
  }

  public function update(Request $request, Cart $cart)
  {
    $request->validate([
      'quantity' => 'required|integer|min:1|max:' . $cart->product->stock,
    ]);

    $cart->quantity = $request->quantity;
    $cart->save();

    return redirect()->back()->with('success', 'Keranjang berhasil diperbarui');
  }

  public function remove(Cart $cart)
  {
    // Check ownership
    if (Auth::check() && $cart->user_id !== Auth::id()) {
      abort(403);
    }

    $cart->delete();

    return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
  }

  public function clear()
  {
    if (Auth::check()) {
      Cart::where('user_id', Auth::id())->delete();
    } else {
      Cart::where('session_id', session()->getId())->delete();
    }

    return redirect()->back()->with('success', 'Keranjang berhasil dikosongkan');
  }

  private function getCartItems()
  {
    if (Auth::check()) {
      return Cart::where('user_id', Auth::id())->with('product')->get();
    } else {
      return Cart::where('session_id', session()->getId())->with('product')->get();
    }
  }
}
