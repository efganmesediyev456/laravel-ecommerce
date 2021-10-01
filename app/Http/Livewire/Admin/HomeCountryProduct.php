<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCountryProduct as HomeModel;
use Livewire\Component;

class HomeCountryProduct extends Component
{
    public $categories=[];
    public $length;
    public function mount(){
        $cat_country=HomeModel::find(1);
        $this->categories=explode(',',$cat_country->category_array);
        $this->length=$cat_country->length;
    }
    public function render()
    {
        // $category_array=HomeModel::find(1);
        // $cats=explode(',',$category_array->category_array);
        // $length=$category_array->length;
        $categories_list=Category::all();

        return view('livewire.admin.home-country-product',compact('categories_list'))->layout('layouts.admin');
    }

    public function save(){
        
        HomeModel::whereId(1)->update([
            'category_array'=>implode(',',$this->categories),
            'length'=>$this->length,
        ]);
        session()->flash('message','Ugurla guncellendi');
    }
}
