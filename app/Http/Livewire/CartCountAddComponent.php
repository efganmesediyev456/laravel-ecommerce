<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCountAddComponent extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.cart-count-add-component');
    }
}
