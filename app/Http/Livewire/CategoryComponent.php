<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{
    use WithPagination;
    public $choseFilter;
    public $countFilter;
    public $category_slug;

    public function mount($category){
        $this->choseFilter="default";
        $this->countFilter=12;
        $this->category_slug=$category;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    
    public function render()
    {
        $category=Category::whereSlug($this->category_slug)->first();
        if($this->choseFilter=="default"){
            $products=Product::where('category_id',$category->id)->paginate($this->countFilter);
        }elseif($this->choseFilter=="date"){
            $products=Product::where('category_id',$category->id)->orderBy('created_at','desc')->paginate($this->countFilter);
        }elseif($this->choseFilter=="price"){
            $products=Product::where('category_id',$category->id)->orderBy('regular_price','asc')->paginate($this->countFilter);
        }elseif($this->choseFilter=="price-desc"){
            $products=Product::where('category_id',$category->id)->orderBy('regular_price','desc')->paginate($this->countFilter);
        }
        
        $categories=Category::all();
        
        return view('livewire.shop-component',compact('products','categories'))->layout('layouts.base');
    }
}
