<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\Department;
use App\Models\Price;

use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Company extends Model
{
    use HasFactory;
    public $guarded=[];
    public function shops(){
        return $this->hasMany(Shop::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function prices(){
        return $this->hasMany(Price::class);
    }
}
