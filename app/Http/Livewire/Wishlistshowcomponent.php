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
    public function movetoCart($rowId){
        $item=Cart::instance("wishlist")->get($rowId);
        Cart::instance("wishlist")->remove($rowId);
        Cart::instance("cart")->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo("cart-count-add-component","refreshComponent");
        $this->emitTo("wish-count-add-component","refreshComponent");
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
