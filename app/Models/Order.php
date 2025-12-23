<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\Fiscal;

class Order extends Model
{
    use HasFactory, HasUuids;
    public $guarded=[];

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
    public function status(){
        return $this->hasMany(OrderStatus::class)->orderBy('created_at','desc');
    }
    public function lastStatus(){
        return $this->hasOne(OrderStatus::class)->latestOfMany();
    }

    public function fiscals(){
        return $this->hasMany(Fiscal::class);
    }
}
