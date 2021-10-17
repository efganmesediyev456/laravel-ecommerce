<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminContactUsPageComponent extends Component
{
    public function render()
    {
        $contacts=Contact::paginate(10);
        return view('livewire.admin.admin-contact-us-page-component',compact('contacts'))->layout("layouts.admin");
    }
}
