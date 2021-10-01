<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CardComponent extends Component
{
    public function destroy($rowId){
        Cart::remove($rowId);
        session()->flash('success_message','Item has been removed');
    }
    public function destroyAll(){
        session()->flash('success_message','Clear Shopping Card');
        Cart::destroy();
    }
    public function increaseQuantity($rowId){
        
        $cart=Cart::get($rowId);
        $qty=$cart->qty+1;
        Cart::update($rowId,$qty);
    }

    public function decreaseQuantity($rowId){
        $cart=Cart::get($rowId);
        $qty=$cart->qty-1;
        Cart::update($rowId,$qty);
    }

    public function render()
    {
        return view('livewire.card-component')->layout('layouts.base');
    }
}
