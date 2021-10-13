<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;

class UserDashboardComponent extends Component
{
    public function render()
    {
        $userOrders=auth()->user()->orders;
        return view('livewire.user.user-dashboard-component',compact('userOrders'))->layout("layouts.base");
    }
}
