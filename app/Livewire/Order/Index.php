<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
class Index extends Component
{
    public $data=[];

    public function mount(){
        $data=Order::with('items')->get();
        dd($data);

    }
    
    public function render()
    {
        
        return view('livewire.order.index');
    }
}
