<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AdminEditCouponComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'code'=>'required|unique:coupons,code,'.$this->coupon_id,
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-coupon-component')->layout("layouts.admin");
    }

    public function save(){
        
       $this->validate([
            'code'=>'required|unique:coupons,code,'.$this->coupon_id,
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required',
        ]);
        $data=[
            'code'=>$this->code,
            'type'=>$this->type,
            'value'=>$this->value,
            'cart_value'=>$this->cart_value,
            'expiry_date'=>$this->expiry_date,
        ];
        Coupon::whereId($this->coupon_id)->update($data);
        session()->flash("message","Coupon Updated Successfully");
        return redirect()->route("coupon.index");

    }
    public function mount($id){
        $coupon=Coupon::find($id);
        $this->code=$coupon->code;
        $this->type=$coupon->type;
        $this->value=$coupon->value;
        $this->cart_value=$coupon->cart_value;
        $this->coupon_id=$coupon->id;
        $this->expiry_date=$coupon->expiry_date;
    }
}
