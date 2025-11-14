<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes - Version 1
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "api" middleware group.
|
| API Base URL: /api/v1
|
*/

// API Version 1
Route::prefix('v1')->group(function () {

  // ========================================
  // Public Routes (No Authentication)
  // ========================================

  // Authentication
  Route::post('/register', [AuthController::class, 'register'])->name('api.register');
  Route::post('/login', [AuthController::class, 'login'])->name('api.login');

  // Products - Public Access
  Route::get('/products', [ProductController::class, 'index'])->name('api.products.index');
  Route::get('/products/featured', [ProductController::class, 'featured'])->name('api.products.featured');
  Route::get('/products/{identifier}', [ProductController::class, 'show'])->name('api.products.show');
  Route::get('/products/{id}/related', [ProductController::class, 'related'])->name('api.products.related');
  Route::get('/search', [ProductController::class, 'search'])->name('api.search');

  // Categories - Public Access
  Route::get('/categories', [ProductController::class, 'categories'])->name('api.categories');


  // ========================================
  // Protected Routes (Require Authentication)
  // ========================================

  Route::middleware('auth:sanctum')->group(function () {

    // Authentication & Profile
    Route::get('/profile', [AuthController::class, 'profile'])->name('api.profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('api.profile.update');
    Route::put('/profile/password', [AuthController::class, 'changePassword'])->name('api.profile.password');
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');

    // Cart Management
    Route::get('/cart', [CartController::class, 'index'])->name('api.cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('api.cart.store');
    Route::put('/cart/{cart}', [CartController::class, 'update'])->name('api.cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('api.cart.destroy');
    Route::delete('/cart', [CartController::class, 'clear'])->name('api.cart.clear');
    Route::get('/cart/count', [CartController::class, 'count'])->name('api.cart.count');

    // Order Management
    Route::get('/orders', [OrderController::class, 'index'])->name('api.orders.index');
    Route::post('/orders', [OrderController::class, 'store'])->name('api.orders.store');
    Route::get('/orders/statistics', [OrderController::class, 'statistics'])->name('api.orders.statistics');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('api.orders.show');
    Route::post('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('api.orders.cancel');
  });
});

// API Health Check
Route::get('/health', function () {
  return response()->json([
    'status' => 'ok',
    'timestamp' => now()->toISOString(),
    'version' => '1.0.0',
  ]);
})->name('api.health');
