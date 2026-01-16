<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;



class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $data=[];

    public function mount(){
        $this->data=Order::with('items')->paginate(10);
       // dd($data);

    }
    
    public function render()
    {
        
        return view('livewire.order.index',['data'=>$this->data]);
    }
}
