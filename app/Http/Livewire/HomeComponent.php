<?php

namespace App\Http\Livewire;

use App\Models\HomeCountryProduct;
use App\Models\HomePageSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders=HomePageSlider::where('status',1)->get();
        $products=Product::orderBy('created_at','desc')->get()->take(8);

        $home_category_product=HomeCountryProduct::find(1);
        $cats=explode(',',$home_category_product->category_array);
        $length=$home_category_product->length;

        $sale_products=Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        
        $sale=Sale::find(1);

        return view('livewire.home-component',compact('sliders','sale','products', 'cats','length','sale_products'))->layout('layouts.base');
    }
}
