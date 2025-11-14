<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'sku' => $this->sku,
            'description' => $this->description,
            'price' => $this->price,
            'formatted_price' => 'Rp ' . number_format($this->price, 0, ',', '.'),
            'stock' => $this->stock,
            'unit' => $this->unit,
            'is_active' => $this->is_active,
            'is_featured' => $this->is_featured,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ],
            'in_stock' => $this->stock > 0,
            'stock_status' => $this->getStockStatus(),
            'created_at' => $this->created_at->toISOString(),
            'updated_at' => $this->updated_at->toISOString(),
        ];
    }

    /**
     * Get stock status label
     */
    private function getStockStatus(): string
    {
        if ($this->stock <= 0) {
            return 'out_of_stock';
        } elseif ($this->stock <= 10) {
            return 'low_stock';
        } else {
            return 'in_stock';
        }
    }
}
