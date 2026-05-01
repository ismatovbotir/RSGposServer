<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Category extends Model
{
    use HasFactory;
    public $guarded=[];
    public function items(){
        return $this->hasMany(Item::class);
    }

    public function parent(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children(){
        return $this->hasMany(Category::class, 'category_id');
    }
}
