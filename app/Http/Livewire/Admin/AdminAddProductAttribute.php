<?php

namespace App\Http\Livewire\Admin;

use App\Models\ProductAttribute;
use Livewire\Component;

class AdminAddProductAttribute extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.admin.admin-add-product-attribute')->layout("layouts.admin");
    }

    public function submit(){

        ProductAttribute::create([
            "name"=>$this->name,
        ]);
        session()->flash("message","Ugurla attribute yaradildi");
        $this->reset("name");
    }
}
