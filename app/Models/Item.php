<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Barcode;
use App\Models\Stock;
use App\Models\OrderItem;
use App\Models\Sell;

class Item extends Model
{
    use HasFactory;
    public $guarded=[];
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function partner(){
        return $this->belongsTo(Partner::class);
    }
    public function barcodes(){
        return $this->hasMany(Barcode::class);
    }
    public function sells(){
        return $this->hasMany(Sell::class);
    }
    public function prices(){
        return $this->hasMany(PriceData::class);
    }
    public function sellPrice(){
        return $this->hasOne(PriceData::class)->where('price_id',2);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);

    }
    public function currentStock()
    {
        $shop_id=env('SHOP',1);
        return $this->hasOne(Stock::class)
        ->where('shop_id', $shop_id)
        ->latest('stock_date'); // latest by date
    }
    public function inventory()
    {
        $shop_id=1;
        return $this->hasOne(Stock::class)
        ->where('shop_id', $shop_id)
        ->latest('stock_date'); // latest by date
    }
    public function order(){
        return $this->hasOne(OrderItem::class);
    }

    
}
