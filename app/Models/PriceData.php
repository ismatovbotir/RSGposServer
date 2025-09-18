<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Price;

class PriceData extends Model
{
    use HasFactory;
    public $guarded=[];
    
    
    public function price(){
        return $this->belongsTo(Price::class);
    }
}
