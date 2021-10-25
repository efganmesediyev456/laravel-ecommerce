<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminProductAttribute extends Component
{
    public function render()
    {
        $attributes=ProductAttribute::paginate(10);
        return view('livewire.admin.admin-product-attribute',compact('attributes'))->layout("layouts.admin");
    }
    public function deleteProduct($id){
        $pro=ProductAttribute::find($id);
        $pro->delete();
        session()->flash("message","ugurla silindi");
    }
}
