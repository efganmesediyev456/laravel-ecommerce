<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomePageSlider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;

    public $slider;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;
    public $slider_id;

    public function mount($slider){
        $slider=HomePageSlider::whereLink($slider)->first();
      
        $this->slider_id=$slider->id;
        $this->title=$slider->title;
        $this->subtitle=$slider->subtitle;
        $this->price=$slider->price;
        $this->link=$slider->link;
        $this->image=$slider->image;
        $this->status=$slider->status;
    }


    
protected $listeners = ['image' => 'change'];

public function change()
{

  dd('image deyisdi');
}


    public function save(){
        
        $slider=HomePageSlider::find($this->slider_id);
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;

        if($this->image!=$slider->image){
           
            if(file_exists(public_path('assets/images/products/'.$slider->image))){
                unlink(public_path('assets/images/products/'.$slider->image));
            }
            $image_name=time().'.'.$this->image->extension();
            $this->image->storeAs('products',$image_name);
            $slider->image=$image_name;
            $this->image=$image_name;
        }
        $slider->status=$this->status;
        $slider->save();
    }

    public function render()
    {
        
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.admin');
    }
}
