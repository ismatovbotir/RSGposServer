<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemArrResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            
            "price"=>$this->sellPrice ? $this->sellPrice->value : 0,
            "stock"=>$this->currentStock ? $this->currentStock->qty :0,
            
        ];
    }
}
