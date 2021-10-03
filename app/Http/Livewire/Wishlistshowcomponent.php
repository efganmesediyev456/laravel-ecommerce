<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class Wishlistshowcomponent extends Component
{
    public function render()
    {
      
        return view('livewire.wishlistshowcomponent')->layout("layouts.base");
    }
    public function removeWishListItem($id){
        
        foreach(Cart::instance("wishlist")->content() as $product){
           
            if($product->id==$id){
                Cart::instance("wishlist")->remove($product->rowId);
                $this->emitTo("wish-count-add-component","refreshComponent");
                return;
            }
        }
    }
}
