<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WoltUser extends Model
{
    use HasFactory;
    public $guarded=[];
    public $incrementing = false;
    protected $keyType = 'string';

}
