<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePasswordUserComponent extends Component
{
    public $password;
    public $password_confirmation;
    public $current_password;

    public function updated($fields){
        $this->validateOnly($fields,[
            'current_password'=>'required',
            'password'=>'required|confirmed|different:current_password',
        ]);
    }
    public function changePassword(){
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|confirmed|different:current_password',
        ]);

        if(Hash::check($this->current_password,Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
           
            $user->password=Hash::make($this->password);

            if($user->save()){
                session()->flash("message","Ugurla password deyisdirildi");
            }else{
                session()->flash("message_err","Password deyisdirilirken xeta oldu");
            }
        }
    }
    public function render()
    {
        return view('livewire.user.change-password-user-component')->layout("layouts.base");
    }
}
