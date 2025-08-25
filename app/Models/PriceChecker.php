<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class PriceChecker extends Model
{
    use HasFactory, HasUuids;

    public $guarded=[];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
