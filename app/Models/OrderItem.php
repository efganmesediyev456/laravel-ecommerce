<?php

namespace App\Models;

use App\Http\Livewire\Admin\AdminCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public $guarded=[];
    public function order(){ 
        return $this->belongsTo(Order::class);
    }
    public function product(){ 
        return $this->belongsTo(Product::class);
    }
    public function category(){ 
        return $this->belongsTo(AdminCategory::class);
    }
    public function review(){
       return $this->hasOne(Review::class);
    }
}
