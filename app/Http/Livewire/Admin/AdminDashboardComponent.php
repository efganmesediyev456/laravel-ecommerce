<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;

class AdminDashboardComponent extends Component
{


    public function render()
    {
        $orders=Order::orderBy("created_at","desc")->get()->take(10);
        $totalSales=Order::where("status","delivered")->count();

        $totalRevenue=Order::where("status","delivered")->sum('total');
        $todaySales=Order::where("status","delivered")->whereDate("created_at",Carbon::today())->count();

        return view('livewire.admin.admin-dashboard-component',compact("orders","totalSales","totalRevenue","todaySales"))->layout('layouts.admin');
    }
}
