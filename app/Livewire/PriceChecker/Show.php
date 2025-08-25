<?php

namespace App\Livewire\PriceChecker;

use Livewire\Component;

class Show extends Component
{
    public $barcode='';
    public $data=null;
    public $id='';

    public function mount($id){
        $this->id=$id;
    }
    public function searchBarcode(){
       // dd($this->barcode);
       $this->reset('barcode');
    }
    public function render()
    {
        return view('livewire.price-checker.show');
    }
}
