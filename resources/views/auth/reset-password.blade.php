




<x-base-layout>

<main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">
                            <x-jet-validation-errors class="mb-4" />
								<form name="frm-login" action="{{ route('password.update') }}" method="POST">
                                @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
										<input id="frm-login-uname" type="email" name="email" value="{{$request->email}}" required autofocus>
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Password:</label>
										<input  id="frm-login-pass" type="password" name="password" required autocomplete="new-password">
									</fieldset>
                                    <fieldset class="wrap-input">
										<label for="frm-login-pass">{{ __('Confirm Password') }}:</label>
										<input  id="frm-login-pass" type="password" name="password_confirmation" required autocomplete="new-password">
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Login" name="submit">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>

    </x-base-layout>