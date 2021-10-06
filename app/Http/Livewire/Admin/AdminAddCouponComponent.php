<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;

class AdminAddCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;

   
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.admin-add-coupon-component')->layout('layouts.admin');
    }
    public function save(){
        
        $validatedData =$this->validate([
            'code'=>'required|unique:coupons',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
        $data=[
            'code'=>$this->code,
            'type'=>$this->type,
            'value'=>$this->value,
            'cart_value'=>$this->cart_value,
            'expiry_date'=>$this->expiry_date

        ];
        Coupon::create($data);
        session()->flash("message","Coupon Created Successfully");
        return redirect()->route("coupon.index");

    }
    public function mount(){
        $this->expiry_date=Carbon::today()->format("Y-m-d");
    }
}
