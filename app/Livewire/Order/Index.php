<?php

namespace App\Livewire\Order;

use Livewire\Component;

class Index extends Component
{
    public $data=[];
    public function render()
    {
        return view('livewire.order.index');
    }
}
