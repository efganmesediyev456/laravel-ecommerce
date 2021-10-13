<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class AdminOrderViewComponent extends Component
{
    public function render()
    {
        $orders=Order::all();
        return view('livewire.admin-order-view-component',["orders"=>$orders])->layout("layouts.admin");
    }
}
