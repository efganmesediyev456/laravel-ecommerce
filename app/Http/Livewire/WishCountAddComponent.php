<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishCountAddComponent extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wish-count-add-component');
    }
}
