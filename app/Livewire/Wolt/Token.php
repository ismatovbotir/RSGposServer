<?php

namespace App\Livewire\Wolt;

use Livewire\Component;
use App\Models\WoltToken;

class Token extends Component
{
    public $wolt_token=null; 
    public $refresh=true;
    public function mount(){

        $this->wolt_token=WoltToken::first();
    }
    
    public function render()
    {
        return view('livewire.wolt.token');
    }
}
