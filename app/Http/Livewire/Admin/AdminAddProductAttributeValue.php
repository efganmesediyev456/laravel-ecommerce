<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddProductAttributeValue extends Component
{
    public function render()
    {
        $product_attributes=ProductAttribute::all();
        $products=Product::all();
        return view('livewire.admin.admin-add-product-attribute-value',compact("product_attributes","products"))->layout("layouts.admin");
    }
}
