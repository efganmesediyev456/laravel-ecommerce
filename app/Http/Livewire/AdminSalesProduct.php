<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Carbon\Carbon;
class AdminSalesProduct extends Component
{
    public $status;
    public $date;

    public function render()
    {
        
        return view('livewire.admin-sales-product')->layout('layouts.admin');
    }

    public function mount(){
        $sales=Sale::find(1);
        $this->date=$sales->date;
        $this->status=$sales->status;
    }

    public function save(){
        Sale::whereId(1)->update([
            'date'=>$this->date,
            'status'=>$this->status
        ]);
        session()->flash('message','Sale has been update');
    }
}
