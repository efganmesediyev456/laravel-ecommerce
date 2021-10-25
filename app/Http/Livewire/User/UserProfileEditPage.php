<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Profile;
use Livewire\WithFileUploads;

class UserProfileEditPage extends Component
{
    public $newImage;
    public $name;
    public $image;
    public $address;
    public $mobile;
    public $line1;
    public $line2;
    public $province;
    public $country;


    public function mount(){
        $user=Auth::user();
        $this->name=$user->name;
        $this->image=$user->profile->image;
        $this->address=$user->profile->address;
        $this->mobile=$user->profile->mobile;
        $this->line1=$user->profile->line1;
        $this->line2=$user->profile->line2;
        $this->province=$user->profile->province;
        $this->country=$user->profile->country;
    }
    use WithFileUploads;
    public function render()
    {
        $profile=Auth::user()->profile;
        if(is_null($profile)){
            $profile=new Profile();
            $profile->user_id=Auth::user()->id;
            $profile->save();
        }
        return view('livewire.user.user-profile-edit-page',compact('profile'))->layout("layouts.base");
    }

    public function update(){

        $user=Auth::user();
        $user->name=$this->name;
        $user->save();
        $profile=$user->profile;
        $profile->country=$this->country;
        $profile->address=$this->address;
        $profile->mobile=$this->mobile;
        $profile->line1=$this->line1;
        $profile->line2=$this->line2;
        $profile->province=$this->province;
        

        if($this->newImage){

            $newImage=uniqid().'.'.$this->newImage->extension();
            unlink(public_path("assets/images/products/".$this->image));
            $this->newImage->storeAs("products",$newImage);
            $this->image=$newImage;
            $profile->image=$newImage;
        }
        $profile->save();
        session()->flash("message","Profil ugurla deyisdirildi");

    }
}
