<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
      'order_number' => $this->order_number,
      'status' => $this->status,
      'status_label' => $this->getStatusLabel(),
      'payment_method' => $this->payment_method,
      'payment_method_label' => $this->getPaymentMethodLabel(),
      'payment_status' => $this->payment_status,
      'payment_status_label' => $this->getPaymentStatusLabel(),
      'subtotal' => $this->subtotal,
      'formatted_subtotal' => 'Rp ' . number_format($this->subtotal, 0, ',', '.'),
      'shipping_cost' => $this->shipping_cost,
      'formatted_shipping_cost' => 'Rp ' . number_format($this->shipping_cost, 0, ',', '.'),
      'total' => $this->total,
      'formatted_total' => 'Rp ' . number_format($this->total, 0, ',', '.'),
      'shipping' => [
        'name' => $this->shipping_name,
        'phone' => $this->shipping_phone,
        'address' => $this->shipping_address,
        'city' => $this->shipping_city,
        'province' => $this->shipping_province,
        'postal_code' => $this->shipping_postal_code,
        'full_address' => $this->getFullShippingAddress(),
      ],
      'notes' => $this->notes,
      'items' => OrderItemResource::collection($this->whenLoaded('items')),
      'customer' => [
        'id' => $this->user->id,
        'name' => $this->user->name,
        'email' => $this->user->email,
        'phone' => $this->user->phone,
      ],
      'can_be_cancelled' => $this->canBeCancelled(),
      'created_at' => $this->created_at->toISOString(),
      'updated_at' => $this->updated_at->toISOString(),
      'cancelled_at' => $this->cancelled_at?->toISOString(),
    ];
  }

  /**
   * Get status label
   */
  private function getStatusLabel(): string
  {
    return match ($this->status) {
      'pending' => 'Menunggu Konfirmasi',
      'processing' => 'Sedang Diproses',
      'shipped' => 'Sedang Dikirim',
      'delivered' => 'Pesanan Diterima',
      'cancelled' => 'Dibatalkan',
      default => ucfirst($this->status),
    };
  }

  /**
   * Get payment method label
   */
  private function getPaymentMethodLabel(): string
  {
    return match ($this->payment_method) {
      'cod' => 'Cash on Delivery',
      'bank_transfer' => 'Transfer Bank',
      'e_wallet' => 'E-Wallet',
      default => $this->payment_method,
    };
  }

  /**
   * Get payment status label
   */
  private function getPaymentStatusLabel(): string
  {
    return match ($this->payment_status) {
      'paid' => 'Lunas',
      'unpaid' => 'Belum Dibayar',
      'refunded' => 'Refund',
      default => ucfirst($this->payment_status),
    };
  }

  /**
   * Get full shipping address
   */
  private function getFullShippingAddress(): string
  {
    return implode(', ', array_filter([
      $this->shipping_address,
      $this->shipping_city,
      $this->shipping_province,
      $this->shipping_postal_code,
    ]));
  }
}
