<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CardComponent extends Component
{
    public function destroy($rowId){
        Cart::instance("cart")->remove($rowId);
        $this->emitTo("cart-count-add-component","refreshComponent");
        session()->flash('success_message','Item has been removed');
    }
    public function destroyAll(){
        session()->flash('success_message','Clear Shopping Card');
        Cart::instance("cart")->destroy();
        session()->flash('success_message','Items has been removed');
        $this->emitTo("cart-count-add-component","refreshComponent");
    }
    public function increaseQuantity($rowId){
        
        $cart=Cart::instance("cart")->get($rowId);
        $qty=$cart->qty+1;
        Cart::instance("cart")->update($rowId,$qty);
        session()->flash('success_message','Item has been added');
        $this->emitTo("cart-count-add-component","refreshComponent");
    }

    public function decreaseQuantity($rowId){
        $cart=Cart::instance("cart")->get($rowId);
        $qty=$cart->qty-1;
        Cart::instance("cart")->update($rowId,$qty);
        session()->flash('success_message','Item has been -1 git removed');
        $this->emitTo("cart-count-add-component","refreshComponent");
    }

    public function render()
    {
        return view('livewire.card-component')->layout('layouts.base');
    }
}
