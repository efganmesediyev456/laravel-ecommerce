




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
                            

                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                                <x-jet-validation-errors class="mb-4" />

								<form name="frm-login" action="{{ route('password.email') }}" method="POST">
                                    @csrf
									
                                  
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email Address:</label>
										<input  id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus  required>
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