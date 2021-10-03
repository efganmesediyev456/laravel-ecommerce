<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $choseFilter;
    public $countFilter;
    public $slider_min;
    public $slider_max;

    public function mount(){
        $this->choseFilter="default";
        $this->countFilter=12;
        $this->slider_min=0;
        $this->slider_max=1000;
    }
    public function store($product_id,$product_name,$product_price){
       

        Cart::instance("cart")->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        $this->emitTo("cart-count-add-component","refreshComponent");
        return redirect()->route('product.cart');
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
    
    public function render()
    {
        if($this->choseFilter=="default"){
            $products=Product::whereBetween('regular_price',[$this->slider_min,$this->slider_max])->paginate($this->countFilter);
        }elseif($this->choseFilter=="date"){
            $products=Product::whereBetween('regular_price',[$this->slider_min,$this->slider_max])->orderBy('created_at','desc')->paginate($this->countFilter);
        }elseif($this->choseFilter=="price"){
            $products=Product::whereBetween('regular_price',[$this->slider_min,$this->slider_max])->orderBy('regular_price','asc')->paginate($this->countFilter);
        }elseif($this->choseFilter=="price-desc"){
            $products=Product::whereBetween('regular_price',[$this->slider_min,$this->slider_max])->orderBy('regular_price','desc')->paginate($this->countFilter);
        }
        $categories=Category::all();
        
        return view('livewire.shop-component',compact('products','categories'))->layout('layouts.base');
    }

    public function wishlistadd($product_id,$product_name,$product_price){
        
       
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
 

        $this->emitTo("wish-count-add-component","refreshComponent");
    }
}
