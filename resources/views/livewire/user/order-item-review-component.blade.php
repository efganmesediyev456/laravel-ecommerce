<div class="container" style="padding:20px 0;">
	<div class="wrap-review-form">

		<div id="comments">
			<ol class="commentlist">
				<li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
					<div id="comment-20" class="comment_container">
						<img alt="" src="{{ asset('assets/images/products/'.Auth::user()->profile->image) }}" height="80" width="80">
						<div class="comment-text">
							<!-- <div class="star-rating">
																<span class="width-80-percent">Rated <strong class="rating">5</strong> out of 5</span>
															</div> -->
							<!-- <p class="meta"> 
																<strong class="woocommerce-review__author">admin</strong> 
																<span class="woocommerce-review__dash">–</span>
																<time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >Tue, Aug 15,  2017</time>
															</p> -->
							<div class="description">
								<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
							</div>
						</div>
					</div>
				</li>
			</ol>
		</div><!-- #comments -->

		<div id="review_form_wrapper">
			<div id="review_form">
				<div id="respond" class="comment-respond">

					@if(Session::has("message"))
					<div class="alert alert-success">{{Session::get("message")}}</div>
					@endif
					<form action="#" method="post" id="commentform" class="comment-form" novalidate="" wire:submit.prevent="reviewAdd">

						<div class="comment-form-rating">
							<span>Your rating</span>
							<p class="stars">

								<label for="rated-1"></label>
								<input type="radio" id="rated-1" name="rating" value="1" wire:model="raiting">
								<label for="rated-2"></label>
								<input type="radio" id="rated-2" name="rating" value="2" wire:model="raiting">
								<label for="rated-3"></label>
								<input type="radio" id="rated-3" name="rating" value="3" wire:model="raiting">
								<label for="rated-4"></label>
								<input type="radio" id="rated-4" name="rating" value="4" wire:model="raiting">
								<label for="rated-5"></label>
								<input type="radio" id="rated-5" name="rating" value="5" checked="checked" wire:model="raiting">
								<br><br>
								@error("raiting") <span class="text-danger">{{$message}}</span> @enderror
							</p>
						</div>

						<p class="comment-form-comment">
							<label for="comment">Your review <span class="required">*</span>
							</label>
							<textarea id="comment" name="comment" cols="45" rows="8" wire:model="comment"></textarea>
							@error("comment") <span class="text-danger">{{$message}}</span>@enderror

						</p>
						<p class="form-submit">
							<input name="submit" type="submit" id="submit" class="submit" value="Submit">
						</p>
					</form>

				</div><!-- .comment-respond-->
			</div><!-- #review_form -->
		</div><!-- #review_form_wrapper -->

	</div>
</div>