<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomePageSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function render()
    {
        $sliders=HomePageSlider::paginate(10);
        return view('livewire.admin.admin-home-slider-component',compact('sliders'))->layout('layouts.admin');
    }

    public function deleteSlider($id){

       $slider=HomePageSlider::find($id);
       
       if(file_exists(public_path('assets/images/products/'.$slider->image))){
            unlink(public_path('assets/images/products/'.$slider->image));
       }
       $slider->delete();
       session()->flash('message','Delete successfully');

    }
}
