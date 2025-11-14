<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
      'quantity' => $this->quantity,
      'product' => [
        'id' => $this->product->id,
        'name' => $this->product->name,
        'slug' => $this->product->slug,
        'sku' => $this->product->sku,
        'price' => $this->product->price,
        'formatted_price' => 'Rp ' . number_format($this->product->price, 0, ',', '.'),
        'stock' => $this->product->stock,
        'unit' => $this->product->unit,
        'is_active' => $this->product->is_active,
        'category' => [
          'id' => $this->product->category->id,
          'name' => $this->product->category->name,
        ],
      ],
      'subtotal' => $this->quantity * $this->product->price,
      'formatted_subtotal' => 'Rp ' . number_format($this->quantity * $this->product->price, 0, ',', '.'),
      'created_at' => $this->created_at->toISOString(),
      'updated_at' => $this->updated_at->toISOString(),
    ];
  }
}
