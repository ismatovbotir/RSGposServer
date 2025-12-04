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
            'code'=>$this->item->id,
            'name' => $this->item->name,
            'order_qty' => $this->order_qty,
            'order_price' => $this->order_price,
            'delivery_qty'=>$this->delivery_qty,
            'dlivery_price'=>$this->delivery_price,
        
        ];
    }
}
