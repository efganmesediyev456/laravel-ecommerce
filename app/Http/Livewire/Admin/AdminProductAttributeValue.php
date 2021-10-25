<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttributeValues;
use Livewire\Component;

class AdminProductAttributeValue extends Component
{
    public function render()
    {
        $attributeValues=ProductAttributeValues::paginate(10);
        return view('livewire.admin.admin-product-attribute-value',compact('attributeValues'))->layout("layouts.admin");
    }
}
