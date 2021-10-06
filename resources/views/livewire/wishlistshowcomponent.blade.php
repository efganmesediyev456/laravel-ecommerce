@push("css")
<style>
    .wishlist-heart{
        font-size:50px;
        position: absolute;
        top:0;
        right:15px;
        cursor:pointer;
        
    }
    .product{
        position: relative;
    }
    .wishlist-heart i{
        color:white;
    }
    .wishlist-heart i:hover{
        color:yellow;
    }
</style>
@endpush
<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Digital & Electronics</span></li>
        </ul>
    </div>

    <div class="row">

	<ul class="product-list grid-products equal-container">


		
		@if(Cart::instance("wishlist")->content()->count()>0)
		@foreach(Cart::instance("wishlist")->content() as $product)
		<li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 last">
			<div class="product product-style-3 equal-elem ">
				<div class="product-thumnail" >
					<a href="detail.html" title="{{ $product->model->name }}">
						<figure><img src="{{ asset('assets/images/products/'.$product->model->image) }}" alt="{{ $product->name }}"></figure>
					</a>
				</div>
				<div class="product-info">
					<a href="{{ route('product.details',['slug'=>$product->model->slug]) }}" class="product-name"><span> {{ Str::limit($product->model->name, 20) }} </span></a>
					<div class="wrap-price"><span class="product-price">${{ $product->model->regular_price }}</span></div>
					<a href="#" wire:click="movetoCart('{{ $product->rowId }}')" class="btn add-to-cart">Move To Cart</a>
				</div>
				<div class="wishlist-heart">
					
					<a onclick="event.preventDefault()" wire:click="removeWishListItem({{ $product->model->id }})" href="#" ><i class="fa fa-heart" style="color:yellow"></i></a>
					
				</div>
			</div>
		</li>
		@endforeach()
        @else
        <div class="alert alert-danger">
            <strong>No Wishlist Data Yet</strong>
        </div>
        @endif
	   
		

	</ul>

</div>
</div>

