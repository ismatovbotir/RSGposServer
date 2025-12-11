<?php

namespace App\Livewire\Wolt;

use Livewire\Component;
use App\Models\WoltToken;

class Token extends Component
{
    public $wolt_token=null; 
    public $isRefresh=true;
    public function mount(){

        $this->wolt_token=WoltToken::first();
    }
    public function refreshToken(){
        $this->isRefresh=false;
       dd($this->wolt_token);
    }
    public function render()
    {
        
        return view('livewire.wolt.token');
    }
}
