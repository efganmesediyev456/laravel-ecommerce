<main id="main" class="main-site">


<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>login</span></li>
        </ul>
    </div>
    <div class=" main-content-area">

       @if(Cart::instance("cart")->count()>0)
       <div class="wrap-iten-in-cart">
            <h3 class="box-title">Products Name</h3>
            @if(session()->has("success_message"))
                <div class="alert alert-success">
                    {{session('success_message')}}
                </div>
            @endif
            <ul class="products-cart">

                @if(Cart::instance('cart')->count()>0)
                @foreach(Cart::instance('cart')->content() as $c)
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{ asset('assets/images/products/'.$c->model->image) }}" alt=""></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('product.details',['slug'=>$c->model->slug]) }}">{{ $c->model->name }}</a>
                    </div>

                    <div class="price-field produtc-price"><p class="price">${{ $c->model->sale_price > 0 ? $c->model->sale_price : $c->model->regular_price }}</p></div>
                    <div class="quantity">
                        <div class="quantity-input">
                            <input type="text" name="product-quatity" value="{{ $c->qty }}" data-max="120" pattern="[0-9]*" >									
                            <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$c->rowId}}')"></a>
                            <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$c->rowId}}')"></a>
                        </div>
                        <div class="text-muted text-center"><a wire:click="saveForLater('{{ $c->rowId }}')" href="#">Save For Later</a></div>
                    </div>
                    <div class="price-field sub-total"><p class="price">${{ $c->subtotal }}</p></div>
                    <div class="delete">
                        <a href="#" class="btn btn-delete" title="">
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true" wire:click.prevent="destroy('{{ $c->rowId }}')"></i>
                        </a>
                    </div>
                </li>	
                @endforeach
                @else
                <h1 class="alert-danger alert">No Cart data</h1>
                @endif
            </ul>
        </div>

        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ Cart::instance('cart')->subtotal() }}</b></p>
              
                     @if(session()->has("coupon"))
                     <p class="summary-info"><span class="title">Discount ({{ session()->get("coupon")['code'] }})<a wire:click.prevent="removeCoupon" href="#"><i class="fa fa-times text-danger"></i></a></span><b class="index">${{ $discount }}</b></p>
                     <p class="summary-info"><span class="title">Tax ({{ config('cart.tax') }}%)</span><b class="index">${{ $taxAfterDiscount }}</b></p>
                     <p class="summary-info"><span class="title">Subtotal with Discount </span><b class="index">${{ $subtotalAfterDiscount }}</b></p>
                     <p class="summary-info"><span class="title">Total</span><b class="index">${{ $totalAfterDiscount }}</b></p>
                    @else
                     <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                     <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{Cart::instance('cart')->total()}}</b></p>
           
                    @endif
                 </div>
            <div class="checkout-info">
                @if(!session()->has("coupon"))
                <label class="checkbox-field">
                    <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox" wire:model="showInputCode"><span>I have promo code</span>
                </label>
                @endif
                @if($showInputCode==true)
                @if(session()->has("message"))
                    <div class="alert alert-danger" role="danger">{{ session("message") }}</div>
                @endif
              
                @if(!session()->has("coupon"))
                <form action="" wire:submit.prevent="addCouponCode" >
                    <div class="form-row form-group">
                        <label for="">Coupon Code</label>
                        <input type="text" wire:model="couponCode" class="form-control"  style="width:20%;">
                    </div>
                    <div class="form-row form-group">
                        <input type="submit"  class="btn btn-primary btn-sm" value="elave et">
                    </div>
                </form>
                @endif
                @endif
                <a class="btn btn-checkout" href="" wire:click.prevent="checkout">Check out</a>
                <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>
            <div class="update-clear">
                <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                <a class="btn btn-update" href="#">Update Shopping Cart</a>
            </div>
        </div>
       @else

       <div class="text-center">
           <h1>No Cart Data</h1>
           <h2>Add Cart Data Item</h2>
           <h3><a href="/shop" class="btn btn-success">Add Item</a> </h3>
       </div>

       @endif



        <!-- burdan  -->
        <hr>
        <div class="wrap-iten-in-cart">
           
         
        <h3 class="box-title">Save For Later </h3>

           
            <ul class="products-cart">

                @if(Cart::instance('saveForLater')->count()>0)
                @foreach(Cart::instance('saveForLater')->content() as $c)
                <li class="pr-cart-item">
                    <div class="product-image">
                        <figure><img src="{{ asset('assets/images/products/'.$c->model->image) }}" alt=""></figure>
                    </div>
                    <div class="product-name">
                        <a class="link-to-product" href="{{ route('product.details',['slug'=>$c->model->slug]) }}">{{ $c->model->name }}</a>
                    </div>

                    <div class="price-field produtc-price"><p class="price">${{ $c->model->sale_price > 0 ? $c->model->sale_price : $c->model->regular_price }}</p></div>
                    <div class="quantity">
                        <div class="quantity-input">
                            <input type="text" name="product-quatity" value="{{ $c->qty }}" data-max="120" pattern="[0-9]*" >									
                        </div>
                        <div class="text-muted text-center"><a wire:click="moveToCart('{{ $c->rowId }}')" href="#">Move To Cart</a></div>
                    </div>
                    <div class="price-field sub-total"><p class="price">${{ $c->subtotal }}</p></div>
                    <div class="delete">
                        <a href="#" class="btn btn-delete" title="">
                            <span>Delete from your cart</span>
                            <i class="fa fa-times-circle" aria-hidden="true" wire:click.prevent="destroy('{{ $c->rowId }}')"></i>
                        </a>
                    </div>
                </li>	
                @endforeach
                @else
                <h1 class="alert-danger alert">No Cart Save For Later</h1>
                @endif
            </ul>
        </div>
        <!-- burdan -->


        <div class="wrap-show-advance-info-box style-1 box-in-site">
            <h3 class="title-box">Most Viewed Products</h3>
            <div class="wrap-products">
                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">sale</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item new-label">new</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>

                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item bestseller-label">Bestseller</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="#" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                            <div class="wrap-price"><span class="product-price">$250.00</span></div>
                        </div>
                    </div>
                </div>
            </div><!--End wrap-products-->
        </div>

    </div><!--end main content area-->
</div><!--end container-->

</main>