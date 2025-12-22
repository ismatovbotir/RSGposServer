<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\Shop;

class Sell extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $guarded=[];
    protected $casts = [
        'abc_date' => 'date',
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

}
