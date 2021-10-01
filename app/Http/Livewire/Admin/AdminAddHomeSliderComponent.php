<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomePageSlider;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $image;
    public $status;

    use WithFileUploads;

    public function mount(){
        $this->status=0;
    }

    public function render()
    {
        $sliders=HomePageSlider::paginate(10);
        return view('livewire.admin.admin-add-home-slider-component',compact('sliders'))->layout('layouts.admin');
    }
    
    protected $rules = [
        'title' => 'required|min:6',
        'subtitle' => 'required',
        'price'=>'required',
        'link' => 'required',
        'image'=>'required|image|mimes:jpeg,png,gif',
        'status'=>'required'

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save(){
        
       $this->validate();

        $slider=new HomePageSlider();
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        if($this->image){
            $image_name=time().'.'.$this->image->extension();
            $this->image->storeAs('products',$image_name);
            $slider->image=$image_name;
        }
        $slider->status=$this->status;
        $slider->link=$this->link;
        $slider->save();

        $this->reset([
            'title', 
            'subtitle',
            'price',
            'image',
            'link',
        ]);

        $slider->status=0;

        session()->flash('message','Ugurla elave olundu');
    }
}
