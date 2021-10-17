<?php

namespace App\Http\Livewire\User;

use App\Models\Contact;
use App\Models\Setting;
use Livewire\Component;

class ContactUsPageComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;
    public function render()
    {
        $settings=Setting::find(1);
        return view('livewire.user.contact-us-page-component',compact("settings"))->layout("layouts.base");
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            "name"=>'required',
            "email"=>'required|email',
            "phone"=>'required',
            "comment"=>'required',
        ]);
    }
    public function saveContact(){
        $this->validate([
            "name"=>'required',
            "email"=>'required|email',
            "phone"=>'required',
            "comment"=>'required',
        ]);

        $contact=Contact::create([
            "name"=>$this->name,
            "email"=>$this->email,
            "phone"=>$this->phone,
            "comment"=>$this->comment,
        ]);
        $this->reset([
            "name","email","phone","comment"
        ]);
        session()->flash("message","Your comment is successfully!!!");
    }
}
