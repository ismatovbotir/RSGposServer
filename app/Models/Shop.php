<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PriceChecker;

class Shop extends Model
{
    use HasFactory;
    
    public $guarded=[];

    public function checkers(){
        return $this->hasMany(PriceChecker::class);

    }
}
