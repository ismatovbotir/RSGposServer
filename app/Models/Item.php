<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Barcode;

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
}
