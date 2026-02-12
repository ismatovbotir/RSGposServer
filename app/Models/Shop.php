<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PriceChecker;
use App\Models\Company;
use App\Models\Price;

class Shop extends Model
{
    use HasFactory;
    
    public $guarded=[];

    public function checkers(){
        return $this->hasMany(PriceChecker::class);

    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function price(){
        return $this->belongsTo(Price::class);
    }
    public function sells(){
        
        return $this->hasMany(Sell::class);
    }
    public function pos(){
        return $this->hasMany(Pos::class);
    }

}
