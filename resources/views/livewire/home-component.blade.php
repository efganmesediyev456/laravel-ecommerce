<main id="main">
		<div class="container">

			<!--MAIN SLIDE-->
			<div class="wrap-main-slide">
				<div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
					@foreach($sliders as $slider)
					<div class="item-slide">
					<img src=" {{ asset('assets/images/products/') }}/{{$slider->image}}"  width="120"/>
						<div class="slide-info slide-1">
							<h2 class="f-title">{{ $slider->title }}</h2>
							<span class="subtitle">{{ $slider->subtitle }}</span>
							<p class="sale-info">Only price: <span class="price">${{ $slider->price }}</span></p>
							<a href="{{ $slider->link }}" class="btn-link">Shop Now</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>

			<!--BANNER-->
			<div class="wrap-banner style-twin-default">
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
					</a>
				</div>
				<div class="banner-item">
					<a href="#" class="link-banner banner-effect-1">
						<figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
					</a>
				</div>
			</div>

			<!--On Sale-->
		
			<div class="wrap-show-advance-info-box style-1 has-countdown">
				<h3 class="title-box">On Sale</h3>
				<div class="wrap-countdown mercado-countdown" data-expire="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$sale->date)->format('Y/m/d H:i:s') }}"></div>
				<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

					@foreach($products as $product)
					<div class="product product-style-2 equal-elem ">
						<div class="product-thumnail">
							<a href="{{ route('product.details',['slug'=>$product->slug]) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
								<figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
							</a>
						</div>
						<div class="product-info">
							<a href="{{ route('product.details',['slug'=>$product->slug]) }}" class="product-name"><span>{{ $product->name }}</span></a>
							<div class="wrap-price"><span class="product-price">${{ $product->regular_price }}</span></div>
						</div>
					</div>
					@endforeach


					

				</div>
			</div>

			<!--Latest Products-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Latest Products</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				@if($sale_products->count() > 0)
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">						
						<div class="tab-contents">
							<div class="tab-content-item active" id="digital_1a">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

									

								
									@foreach($sale_products as $spro)
								


									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{ route('product.details',['slug'=>$spro->slug]) }}" title="{{ $spro->name }}">
											<figure><img src="{{ asset('assets/images/products') }}/{{ $spro->image }}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item sale-label">sale</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{ $spro->name }}</span></a>
											<div class="wrap-price"><ins><p class="product-price">{{ $spro->sale_price }}</p></ins> <del><p class="product-price">${{ $spro->regular_price }} </p></del> </div>
										</div>
									</div>

									@endforeach
									
									


								</div>
							</div>							
						</div>
					</div>
				</div>

				@endif
			</div>

			<!--Product Categories-->
			<div class="wrap-show-advance-info-box style-1">
				<h3 class="title-box">Product Categories</h3>
				<div class="wrap-top-banner">
					<a href="#" class="link-banner banner-effect-2">
						<figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
					</a>
				</div>
				<div class="wrap-products">
					<div class="wrap-product-tab tab-style-1">
						<div class="tab-control">

							@foreach($cats as $cat)
							@php
								$category=DB::table('categories')->whereId($cat)->first();
							@endphp
						
							<a href="#category_{{$cat}}" class="tab-control-item @if($loop->index == 0) active @endif">{{ $category->name }}</a>
							
							
							@endforeach()
							
							
						</div>
						<div class="tab-contents">

							
						@foreach($cats as $cat)

						@php
								$category=App\Models\Category::find($cat);
						@endphp

						
						<div class="tab-content-item @if($loop->index == 0) active @endif" id="category_{{ $cat }}">
								<div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >

								

							
									
								    @foreach($category->products()->take($length) as $pro)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{ route('product.details',['slug'=>$pro->slug]) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
												<figure><img src="{{ asset('assets/images/products') }}/{{ $pro->image }}" width="800" height="800" alt="{{ $pro->name }}"></figure>
											</a>
										</div>
										<div class="product-info">
											<a href="#" class="product-name"><span>{{ $pro->name }}</span></a>
											<div class="wrap-price"><span class="product-price">${{ $pro->regular_price }}</span></div>
										</div>
									</div>
									@endforeach


						
								</div>

								

								
						</div>
						@endforeach

							
						</div>
					</div>
				</div>
			</div>			

		</div>

	</main>

