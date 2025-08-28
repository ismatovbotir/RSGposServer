<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Barcode extends Model
{
    use HasFactory;
    public $guarded=[];
    public $incrementing = false;   // отключаем автоинкремент
    protected $keyType = 'string';  // говорим что id — строка

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
