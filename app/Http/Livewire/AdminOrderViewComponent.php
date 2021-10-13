<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminOrderViewComponent extends Component
{
    public function render()
    {
        $orders=Order::all();
        return view('livewire.admin-order-view-component',["orders"=>$orders])->layout("layouts.admin");
    }
    public function updateOrder($id,$status){
        $order=Order::find($id);
        $order->status=$status;
        if($status=="delivered"){
            $order->delivered_date=DB::raw("CURRENT_DATE");
        }else if($status=="canceled"){
            $order->canceled_date=DB::raw("CURRENT_DATE");
        }
        $order->save();
        session()->flash("message","Successfully Updated Ordered Status");
    }
}
