<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Company extends Model
{
    use HasFactory;
    public $guarded=[];
    public function shops(){
        return $this->hasMany(Shop::class);
    }
}
