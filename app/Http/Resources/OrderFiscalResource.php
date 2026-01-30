<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderFiscalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'type' => $this->type,
            'total'=>$this->total,
            'fiscal_url'=>$this->fiscal_url,
            'date' => $this->created_at->format('Y-m-d H:i'),
        ];
    }
}
