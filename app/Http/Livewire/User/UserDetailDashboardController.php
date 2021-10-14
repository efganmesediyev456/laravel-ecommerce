<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserDetailDashboardController extends Component
{
    public $order_id;
    public $test;
    public function mount($id){
        $this->order_id=$id;
    }
    public function render()
    {
        $order=Order::find($this->order_id);
        return view('livewire.user.user-detail-dashboard-controller',compact('order'))->layout("layouts.base");
    }
    public function orderCanceled($id){
        Order::whereId($id)->update([
            "status"=>"canceled",
            "canceled_date"=>DB::raw("CURRENT_DATE"),
        ]);
        session()->flash("message","Order Canceled");
    }
}
