<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\BaseModel;
use App\Models\Shop;


class Price extends Model
{
    use HasFactory;
    public $guarded=[];
    public function shop(){
        return $this->hasOne(Shop::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
