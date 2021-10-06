<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order_items(){
        return $this->hasMany(order_items::class);
    }

    public function shipping(){
        return $this->hasOne(Shipping::class);
    }

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
}