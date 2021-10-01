<x-guest-layout>
<main id="main" class="main-site left-sidebar">
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>Register</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
					<div class=" main-content-area">
						<div class="wrap-login-item ">
							<div class="register-form form-item ">
                            <x-jet-validation-errors class="mb-4" />
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Create an account</h3>
										<h4 class="form-subtitle">Personal infomation</h4>
									</fieldset>									
									<fieldset class="wrap-input">
										<label for="frm-reg-lname">Name*</label>
										<input type="text" id="frm-reg-lname" placeholder="Last name*" name="name" :value="old('name')" required>
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-reg-email">Email Address*</label>
										<input  id="frm-reg-email" type="email" name="email" :value="old('email')" required  placeholder="Email address">
									</fieldset>
									<fieldset class="wrap-title">
										<h3 class="form-title">Login Information</h3>
									</fieldset>
									<fieldset class="wrap-input item-width-in-half left-item ">
										<label for="frm-reg-pass">Password *</label>
										<input type="text" id="frm-reg-pass" name="password" required autocomplete="new-password" placeholder="Password">
									</fieldset>
									<fieldset class="wrap-input item-width-in-half ">
										<label for="frm-reg-cfpass">Confirm Password *</label>
										<input type="text" id="frm-reg-cfpass" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
									</fieldset>
									<input type="submit" class="btn btn-sign" value="Register" name="register">
								</form>
							</div>											
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
    </x-guest-layout>