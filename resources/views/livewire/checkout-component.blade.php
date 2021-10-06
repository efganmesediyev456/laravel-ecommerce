<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-address-billing">
					<h3 class="box-title">Billing Address</h3>
						<form action="#" method="get" name="frm-billing">
							<p class="row-in-form">
								<label for="fname">first name<span>*</span></label>
								<input id="fname" type="text" name="fname" value="" placeholder="Your name" wire:model="firstname">
								@error("firstname") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="lname">last name<span>*</span></label>
								<input id="lname" type="text" name="lname" value="" placeholder="Your last name" wire:model="lastname">
								@error("lastname") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="email">Email Addreess:</label>
								<input id="email" type="email" name="email" value="" placeholder="Type your email" wire:model="email">
								@error("email") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="phone">Phone number<span>*</span></label>
								<input id="phone" type="number" name="phone" value="" placeholder="10 digits format" wire:model="mobile">
								@error("mobile") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="add">Address:</label>
								<input id="add" type="text" name="add" value="" placeholder="Street at apartment number"  wire:model="address">
								@error("address") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="line1">Line1:</label>
								<input id="line1" type="text" name="line1" value="" placeholder="Line1" wire:model="line1">
								@error("line1") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="line2">Line2:</label>
								<input id="line2" type="text" name="line2" value="" placeholder="Line2" wire:model="line2">
								@error("line2") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="country">Country<span>*</span></label>
								<input id="country" type="text" name="country" value="" placeholder="United States" wire:model="country">
								@error("country") <span class="text-danger">{{ $message }}</span> @enderror
							</p>

							<p class="row-in-form">
								<label for="province">Province<span>*</span></label>
								<input id="province" type="text" name="province" value="" placeholder="Province" wire:model="province">
								@error("province") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="zip-code">Postcode / ZIP:</label>
								<input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
								@error("zipcode") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="city">Town / City<span>*</span></label>
								<input id="city" type="text" name="city" value="" placeholder="City name" wire:model="city">
								@error("city") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form fill-wife">
								
								<label class="checkbox-field">
									<input name="different-add" id="different-add" value="1" type="checkbox" wire:model="is_shipping_different">
									<span>Ship to a different address?</span>
								</label>
							</p>
						</form>
					
				</div>


				<div class="wrap-address-billing">
				@if($is_shipping_different)
						<h3 class="box-title">Shipping Address</h3>
						<form action="#" method="get" name="frm-billing">
							<p class="row-in-form">
								<label for="fname">first name<span>*</span></label>
								<input id="fname" type="text" name="fname" value="" placeholder="Your name" wire:model="s_firstname">
								@error("s_firstname") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="lname">last name<span>*</span></label>
								<input id="lname" type="text" name="lname" value="" placeholder="Your last name" wire:model="s_lastname">
								@error("s_lastname") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="email">Email Addreess:</label>
								<input id="email" type="email" name="email" value="" placeholder="Type your email" wire:model="s_email">
								@error("s_email") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="phone">Phone number<span>*</span></label>
								<input id="phone" type="number" name="phone" value="" placeholder="10 digits format" wire:model="s_mobile">
								@error("s_mobile") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="add">Address:</label>
								<input id="add" type="text" name="add" value="" placeholder="Street at apartment number" wire:model="s_address">
								@error("s_address") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="line1">Line1:</label>
								<input id="line1" type="text" name="line1" value="" placeholder="Line1" wire:model="s_line1">
								@error("s_line1") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="line2">Line2:</label>
								<input id="line2" type="text" name="line2" value="" placeholder="Line2" wire:model="s_line2">
								@error("s_line2") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="country">Country<span>*</span></label>
								<input id="country" type="text" name="country" value="" placeholder="United States" wire:model="s_country"> 
								@error("s_country") <span class="text-danger">{{ $message }}</span> @enderror
							</p>

							<p class="row-in-form">
								<label for="province">Province<span>*</span></label>
								<input id="province" type="text" name="province" value="" placeholder="Province" wire:model="s_province">
								@error("s_province") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="zip-code">Postcode / ZIP:</label>
								<input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
								@error("s_postcode") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							<p class="row-in-form">
								<label for="city">Town / City<span>*</span></label>
								<input id="city" type="text" name="city" value="" placeholder="City name" wire:model="s_city">
								@error("s_city") <span class="text-danger">{{ $message }}</span> @enderror
							</p>
							
						</form>
					@endif
				</div>
				
				
					<div class="summary summary-checkout">
						@if($paymentmode=="card")
						<div class="summary-item payment-method">
							@if(Session::has('stripe_error'))
							<div class="alert alert-danger">{{ Session::get("stripe_error")}}</div>
							@endif
						<h4 class="title-box">Payment Method</h4>
					
						<div class="wrap-address-billing">
						<p class="row-in-form">
								<label for="fname">Card Number<span>*</span></label>
								<input id="fname" type="text" name="fname" value="" placeholder="Card Number" wire:model="card_num">
								@error("card_num") <span class="text-danger">{{ $message }}</span> @enderror
						</p>

						<p class="row-in-form">
								<label for="fname">Expiry Month<span>*</span></label>
								<input id="fname" type="text" name="fname" value="" placeholder="MM" wire:model="exp_month">
								@error("exp_month") <span class="text-danger">{{ $message }}</span> @enderror
						</p>

						<p class="row-in-form">
								<label for="fname">Expiry Year<span>*</span></label>
								<input id="fname" type="text" name="fname" value="" placeholder="YYYY" wire:model="exp_year">
								@error("exp_year") <span class="text-danger">{{ $message }}</span> @enderror
						</p>

						<p class="row-in-form">
								<label for="fname">CVC<span>*</span></label>
								<input id="fname" type="text" name="fname" value="" placeholder="CVC" wire:model="cvc">
								@error("cvc") <span class="text-danger">{{ $message }}</span> @enderror
						</p>

					</div>
						@endif
					



						<div class="choose-payment-methods">
							<label class="payment-method">
								<input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
								<span>Cash On Delivery</span>
								<span class="payment-desc">Order Now Or Pay On Delivery</span>
						
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
								<span>Debit/Credit Cart</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>
							<label class="payment-method">
								<input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
							@error("paymentmode") <span class="text-danger">{{ $message }}</span> @enderror
						</div>
						<p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{ session()->get("checkout")["total"] }}</span></p>
						<a href="#" class="btn btn-medium" wire:click.prevent="odeme">Place order now</a>
					</div>
					<div class="summary-item shipping-method">
						<h4 class="title-box f-title">Shipping method</h4>
						<p class="summary-info"><span class="title">Flat Rate</span></p>
						<p class="summary-info"><span class="title">Fixed $50.00</span></p>
						
						
					</div>
				</div>

			</div><!--end main content area-->
		</div><!--end container-->

	</main>