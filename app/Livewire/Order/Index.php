<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;



class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //public $data=[];

    public function mount(){
      
       // dd($data);

    }
    
    public function render()
    {
        
        return view('livewire.order.index',[
            'data'=>Order::with('items')->latest()->paginate(10)]);
    }
}
