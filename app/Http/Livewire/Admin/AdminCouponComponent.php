<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponComponent extends Component
{
    public function render()
    {
        
        $coupons=Coupon::all();
        return view('livewire.admin.admin-coupon-component',compact('coupons'))->layout('layouts.admin');
    }

    public function deleteCoupon($id){
        Coupon::whereId($id)->delete();
        session()->flash("message","Coupon ugurla silindi");
    }
}
