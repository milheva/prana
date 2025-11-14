<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'product_id' => $this->product_id,
            'product_name' => $this->product_name,
            'product_sku' => $this->product_sku,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'formatted_price' => 'Rp ' . number_format($this->price, 0, ',', '.'),
            'subtotal' => $this->subtotal,
            'formatted_subtotal' => 'Rp ' . number_format($this->subtotal, 0, ',', '.'),
            'product' => $this->whenLoaded('product', function () {
                return [
                    'id' => $this->product->id,
                    'name' => $this->product->name,
                    'slug' => $this->product->slug,
                    'sku' => $this->product->sku,
                    'unit' => $this->product->unit,
                    'current_price' => $this->product->price,
                    'current_stock' => $this->product->stock,
                ];
            }),
        ];
    }
}
