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
            'code'=>$this->code,
            'customer' => $this->customer_name,
            'total' => $this->total_price,

            // Items
            'items' => OrderItemResource::collection($this->items),

            // Last Status
            'last_status' =>  new OrderStatusResource($this->whenLoaded('lastStatus')),
        ];
    }
}
