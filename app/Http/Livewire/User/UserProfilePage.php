<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Profile;

class UserProfilePage extends Component
{
    public function render()
    {
        $profile=Auth::user()->profile;
        if(is_null($profile)){
            $profile=new Profile();
            $profile->user_id=Auth::user()->id;
            $profile->save();
        }
        return view('livewire.user.user-profile-page',compact("profile"))->layout("layouts.base");
    }
}
