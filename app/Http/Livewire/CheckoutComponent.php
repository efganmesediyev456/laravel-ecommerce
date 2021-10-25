<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Cart;
use Exception;
use Illuminate\Support\Facades\Mail;
use Stripe;

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


    public $card_num;
    public $exp_month;
    public $exp_year;
    public $cvc;

    public function update($fields)
    {
        $this->validateOnly($fields, [
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "mobile" => "required|numeric",
            "line1" => "required",
            "city" => "required",
            "province" => "required",
            "country" => "required",
            "paymentmode" => "required",
            "zipcode" => 'required'
        ]);

        if ($this->is_shipping_different) {
            $this->validate($fields, [
                "s_firstname" => "required",
                "s_lastname" => "required",
                "s_email" => "required|email",
                "s_mobile" => "required|numeric",
                "s_line1" => "required",
                "s_city" => "required",
                "s_province" => "required",
                "s_country" => "required",
                "s_paymentmode" => "required",
                "s_zipcode" => 'required'
            ]);
        }

        if ($this->paymentmode == "card") {
            $this->validateOnly($fields, [
                "card_num" => "required|numeric",
                "exp_month" => "required|numeric",
                "exp_year" => "required|numeric",
                "cvc" => "required|numeric",
            ]);
        }
    }
    public function odeme()
    {

        $this->validate([
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",
            "mobile" => "required|numeric",
            "line1" => "required",
            "city" => "required",
            "province" => "required",
            "country" => "required",
            "paymentmode" => "required",
            "zipcode" => 'required'
        ]);

        if ($this->is_shipping_different == true) {
            $this->validate([
                "s_firstname" => "required",
                "s_lastname" => "required",
                "s_email" => "required|email",
                "s_mobile" => "required|numeric",
                "s_line1" => "required",
                "s_city" => "required",
                "s_province" => "required",
                "s_country" => "required",
                "s_zipcode" => 'required'
            ]);
        }

        if ($this->paymentmode == "card") {
            $this->validate([
                "card_num" => "required|numeric",
                "exp_month" => "required|numeric",
                "exp_year" => "required|numeric",
                "cvc" => "required|numeric",
            ]);
        }

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'subtotal' => session()->get("checkout")["subtotal"],
            "discount" => session()->get("checkout")["discount"],
            'tax' => session()->get("checkout")["tax"],
            "total" => session()->get("checkout")["total"],
            "email" => $this->email,
            "firstname" => $this->firstname,
            "lastname" => $this->lastname,
            "mobile" => $this->mobile,
            "line1" => $this->line1,
            "line2" => $this->line2,
            "city" => $this->city,
            "province" => $this->province,
            "country" => $this->country,
            "zipcode" => $this->zipcode,
            "status" => "ordered",
            "is_shipping_different" => $this->is_shipping_different
        ]);

        foreach (Cart::instance("cart")->content() as $cart) {
            OrderItem::create([
                "product_id" => $cart->id,
                "order_id" => $order->id,
                "price" => $cart->price,
                "quantity" => $cart->qty,
            ]);
        }

        if ($this->is_shipping_different) {
            Shipping::create([
                "order_id" => $order->id,
                "firstname" => $this->s_firstname,
                "lastname" => $this->s_lastname,
                "mobile" => $this->s_mobile,
                "email" => $this->s_email,
                "line1" => $this->s_line1,
                "line2" => $this->s_line2,
                "city" => $this->s_city,
                "province" => $this->s_province,
                "country" => $this->s_country,
                "zipcode" => $this->s_zipcode,
            ]);
        }

        if ($this->paymentmode == "cod") {
            $this->make_transaction($order->id, "pending");

            $this->resetCart();
        } else if ($this->paymentmode == "card") {


            $stripe = Stripe::make(config("app.stripe_key"));
            try {

                $token = $stripe->tokens()->create([
                    "card" => [
                        "number" => $this->card_num,
                        "exp_month" => $this->exp_month,
                        "exp_year" => $this->exp_year,
                        "cvc" => $this->cvc,
                    ],
                ]);
                if (!isset($token["id"])) {
                    session()->flash("stripe_error", "The Stripe Token was not genearted correctly");
                }

                $customer = $stripe->customers()->create([
                    "name" => $this->firstname . " " . $this->lastname,
                    "email" => $this->email,
                    "phone" => $this->mobile,
                    "address" => [
                        "line1" => $this->line1,
                        "postal_code" => $this->zipcode,
                        "city" => $this->city,
                        "state" => $this->province,
                        "country" => $this->country,
                    ],
                    "shipping" => [
                        "name" => $this->firstname . " " . $this->lastname,
                        "address" => [
                            "line1" => $this->line1,
                            "postal_code" => $this->zipcode,
                            "city" => $this->city,
                            "state" => $this->province,
                            "country" => $this->country,
                        ],
                    ],
                    "source" => $token["id"],


                ]);


                $charge = $stripe->charges()->create([
                    "customer" => $customer["id"],
                    "currency" => "USD",
                    "amount" => session()->get("checkout")["total"],
                    "description" => "Payment for order no " . $order->id,
                ]);

                if ($charge["status"] == "succeeded") {
                    $this->make_transaction($order->id, "approved");
                    $this->resetCart();
                    return redirect()->route("thankyou");
                } else {
                    session()->flash("stripe_error", "Transaction Error");
                }
            } catch (Exception $e) {
                session()->flash("stripe_error", $e->getMessage());
            }
        }

        Mail::to($order->email)->send(new OrderMail($order));


    }

    public function resetCart()
    {
        session()->forget("checkout");
        Cart::instance("cart")->destroy();
        return redirect()->route("thankyou");
    }

    public function make_transaction($order_id, $status)
    {
        Transaction::create([
            "user_id" => Auth::user()->id,
            "order_id" => $order_id,
            "mode" => $this->paymentmode,
            "status" => $status,

        ]);
    }
    public function test()
    {
        if (!Auth::check()) {
            return redirect()->route("login");
        }
    }
    public function render()
    {
        $this->test();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
