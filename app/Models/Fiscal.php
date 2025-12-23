<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Fiscal extends Model
{
    use HasFactory, HasUuids;
    public $guarded=[];
    
    public function order(){

        return $this->belongsTo(Order::class);
    }
}
