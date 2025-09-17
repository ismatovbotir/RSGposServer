<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Department extends Model
{
    use HasFactory;
    public $guarded=[];
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
