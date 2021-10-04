<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Carbon\Carbon;
use Livewire\Component;
use Cart;

class CardComponent extends Component
{
    public $couponCode;
    public $showInputCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function mount(){
        $this->showInputCode=false;
    }
    public function destroy($rowId){
        Cart::instance("cart")->remove($rowId);
        $this->emitTo("cart-count-add-component","refreshComponent");
        session()->flash('success_message','Item has been removed');
    }
    public function destroyAll(){
        session()->flash('success_message','Clear Shopping Card');
        Cart::instance("cart")->destroy();
        session()->flash('success_message','Items has been removed');
        $this->emitTo("cart-count-add-component","refreshComponent");
    }
    public function increaseQuantity($rowId){
        
        $cart=Cart::instance("cart")->get($rowId);
        $qty=$cart->qty+1;
        Cart::instance("cart")->update($rowId,$qty);
        session()->flash('success_message','Item has been added');
        $this->emitTo("cart-count-add-component","refreshComponent");
    }

    public function decreaseQuantity($rowId){
        $cart=Cart::instance("cart")->get($rowId);
        $qty=$cart->qty-1;
        Cart::instance("cart")->update($rowId,$qty);
        session()->flash('success_message','Item has been -1 git removed');
        $this->emitTo("cart-count-add-component","refreshComponent");
    }

    public function render()
    {
        
       
        if(session()->has("coupon")){
            if(session()->get("coupon")["cart_value"] > Cart::instance("cart")->subtotal()){
                session()->forget("coupon");
            }else{
                $this->calculateDiscounts();
               
            }
        }
        return view('livewire.card-component')->layout('layouts.base');
    }

    public function saveForLater($rowId){
        $item=Cart::instance("cart")->get($rowId);
        Cart::instance("cart")->remove($rowId);
        Cart::instance("saveForLater")->add($item->id, $item->name,$item->qty,$item->price)->associate("App\Models\Product");
        $this->emitTo("cart-count-add-component","refreshComponent");
    }

    public function moveToCart($rowId){
        $item=Cart::instance("saveForLater")->get($rowId);
        Cart::instance("saveForLater")->remove($rowId);
        Cart::instance("cart")->add($item->id, $item->name,$item->qty,$item->price)->associate("App\Models\Product");
        $this->emitTo("cart-count-add-component","refreshComponent");
    }
    public function addCouponCode(){

        $coupon=Coupon::whereCode($this->couponCode)->where('expiry_date','>',Carbon::today())->where('cart_value',"<=",Cart::instance("cart")->subtotal())->first();

        if(!$coupon){
            session()->flash("message","No coupon Value");
        }else{
            session()->put("coupon",[
              'code'=>$coupon->code,
              'type'=> $coupon->type,
              'value'=> $coupon->value,
              'cart_value'=> $coupon->cart_value,
              'expiry_date'=>$coupon->expiry_date
            ]);
            $this->showInputCode=false;
        }
        
        
    }

    public function calculateDiscounts(){
        if(session()->has("coupon")){
            if(session()->get("coupon")["type"]=="fixed"){
                $this->discount=session()->get("coupon")["value"];
            }else{
                $this->discount=(Cart::instance("cart")->subtotal()*session()->get("coupon")["value"])/100;
            }
            $this->subtotalAfterDiscount=Cart::instance("cart")->subtotal()-$this->discount;
            $this->taxAfterDiscount=($this->subtotalAfterDiscount*config("cart.tax"))/100;
            $this->totalAfterDiscount=$this->taxAfterDiscount+$this->subtotalAfterDiscount;

        }
    }

    public function removeCoupon(){
        session()->forget("coupon");
    }
    
}
