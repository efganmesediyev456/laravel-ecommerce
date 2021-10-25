<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminEditProductAttribute extends Component
{
    public $name;
    public $attr_id;
    public function mount($attribute){
        $attribute=ProductAttribute::find($attribute);
        $this->attr_id=$attribute;
        $this->name=$attribute->name;
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-product-attribute')->layout("layouts.admin");
    }

    public function guncelle(){

        $attribute=ProductAttribute::find($this->attr_id)->first();
        $attribute->name=$this->name;
        $attribute->save();
        session()->flash("message","Ugurla attribute guncellendi");
    }
}
