<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Cart;

class CheckoutComponent extends Component
{


    public $firstname;
    public $address;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $status;
    public $is_shipping_different;
 


    public $s_firstname;
    public $s_address;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;
    public $s_status;
   
    public $paymentmode;

    

    public function update($fields){
        $this->validateOnly($fields,[
            "firstname"=>"required",
            "lastname"=>"required",
            "email"=>"required|email",
            "mobile"=>"required|numeric",
            "line1"=>"required",
            "city"=>"required",
            "province"=>"required",
            "country"=>"required",
            "paymentmode"=>"required",
            "zipcode"=>'required'
        ]);

        if($this->is_shipping_different){
            $this->validate($fields,[
                "s_firstname"=>"required",
                "s_lastname"=>"required",
                "s_email"=>"required|email",
                "s_mobile"=>"required|numeric",
                "s_line1"=>"required",
                "s_city"=>"required",
                "s_province"=>"required",
                "s_country"=>"required",
                "s_paymentmode"=>"required",
                "s_zipcode"=>'required'
            ]);
        }
    }
    public function odeme(){
       
        $this->validate([
            "firstname"=>"required",
            "lastname"=>"required",
            "email"=>"required|email",
            "mobile"=>"required|numeric",
            "line1"=>"required",
            "city"=>"required",
            "province"=>"required",
            "country"=>"required",
            "paymentmode"=>"required",
            "zipcode"=>'required'
        ]);

        if($this->is_shipping_different==true){
            $this->validate([
                "s_firstname"=>"required",
                "s_lastname"=>"required",
                "s_email"=>"required|email",
                "s_mobile"=>"required|numeric",
                "s_line1"=>"required",
                "s_city"=>"required",
                "s_province"=>"required",
                "s_country"=>"required",
                "s_zipcode"=>'required'
            ]);
        }

        $order=Order::create([
            'user_id'=>Auth::user()->id,
            'subtotal'=>session()->get("checkout")["subtotal"],
            "discount"=>session()->get("checkout")["discount"],
            'tax'=>session()->get("checkout")["tax"],
            "total"=>session()->get("checkout")["total"],
            "email"=>$this->email,
            "firstname"=>$this->firstname,
            "lastname"=>$this->lastname,
            "mobile"=>$this->mobile,
            "line1"=>$this->line1,
            "line2"=>$this->line2,
            "city"=>$this->city,
            "province"=>$this->province,
            "country"=>$this->country,
            "zipcode"=>$this->zipcode,
            "status"=>"ordered",
            "is_shipping_different"=>$this->is_shipping_different
        ]);

        foreach(Cart::instance("cart")->content() as $cart){
            OrderItem::create([
                "product_id"=>$cart->id,
                "order_id"=>$order->id,
                "price"=>$cart->price,
                "quantity"=>$cart->qty,
            ]);
        }

        if($this->is_shipping_different){
            Shipping::create([
                "order_id"=>$order->id,
                "firstname"=>$this->s_firstname,
                "lastname"=>$this->s_lastname,
                "mobile"=>$this->s_mobile,
                "email"=>$this->s_email,
                "line1"=>$this->s_line1,
                "line2"=>$this->s_line2,
                "city"=>$this->s_city,
                "province"=>$this->s_province,
                "country"=>$this->s_country,
                "zipcode"=>$this->s_zipcode,
            ]);
        }

        if($this->paymentmode=="cod"){
            Transaction::create([
                "user_id"=>Auth::user()->id,
                "order_id"=>$order->id,
                "mode"=>"cod",
                "status"=>"pending",

            ]);
        }

        session()->forget("checkout");
        Cart::instance("cart")->destroy();
        return redirect()->route("thankyou");

    }

    public function test(){
        if(!Auth::check()){
            return redirect()->route("login");
        }else if(Cart::instance("cart")->count()==0){
          
            return redirect()->route("shop"); 
        }
    }
    public function render()
    {
        $this->test();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
