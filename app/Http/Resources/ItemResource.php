<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'mark'=>$this->mark,
            'category'=>new CategoryResource($this->whenLoaded('category')),
            
            'mxik'=>[
                'class_code'=>$this->class_code,
                'package_code'=>$this->package_code,
                'asl_belgi'=>$this->aslbelgi
            ],
            'barcodes'=>BarcodeResource::collection($this->barcodes),
            "price"=>$this->sellPrice ? $this->sellPrice->value : 0,
            "stock"=>$this->currentStock ? $this->currentStock->qty :0,
            'delivery'=>[
                'width'=>$this->width,
                'height'=>$this->height,
                'length'=>$this->length,
                'weight'=>$this->weight
                ]



        ];
    }
}
