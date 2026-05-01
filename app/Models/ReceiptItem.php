<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class ReceiptItem extends Model
{
    use HasFactory;
    public $guarded=[];

    public function receipt(){
        return $this->belongsTo(Receipt::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
