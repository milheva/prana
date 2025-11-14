<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get all products with filters
     */
    public function index(Request $request)
    {
        $query = Product::with('category')->where('is_active', true);

        // Search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Price range filter
        if ($request->has('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Stock filter
        if ($request->has('in_stock') && $request->in_stock == 'true') {
            $query->where('stock', '>', 0);
        }

        // Featured filter
        if ($request->has('is_featured') && $request->is_featured == 'true') {
            $query->where('is_featured', true);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = $request->get('per_page', 15);
        $products = $query->paginate($perPage);

        return new ProductCollection($products);
    }

    /**
     * Get single product by ID or slug
     */
    public function show($identifier)
    {
        // Try to find by ID first, then by slug
        $product = is_numeric($identifier)
            ? Product::with('category')->findOrFail($identifier)
            : Product::with('category')->where('slug', $identifier)->firstOrFail();

        if (!$product->is_active) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak tersedia',
            ], 404);
        }

        return new ProductResource($product);
    }

    /**
     * Get featured products
     */
    public function featured(Request $request)
    {
        $limit = $request->get('limit', 8);

        $products = Product::with('category')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        return ProductResource::collection($products);
    }

    /**
     * Get related products (same category)
     */
    public function related($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $limit = $request->get('limit', 4);

        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit($limit)
            ->get();

        return ProductResource::collection($relatedProducts);
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2',
        ]);

        $query = $request->q;
        $products = Product::with('category')
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('sku', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->orderBy('name', 'asc')
            ->paginate(15);

        return new ProductCollection($products);
    }

    /**
     * Get categories
     */
    public function categories()
    {
        $categories = Category::where('is_active', true)
            ->withCount(['products' => function ($query) {
                $query->where('is_active', true);
            }])
            ->orderBy('name', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $categories,
        ]);
    }
}
