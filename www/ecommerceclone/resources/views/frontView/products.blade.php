@extends('layouts/FrontLayout/front_design')
@section('contents')
	<!-- Title Page -->
	<section class="bg-title-page p-b-150 flex-col-c-m" style="background-image: url(../svg/frontendImages/logo.png)">
		<h2 class="l-text2 t-center">
			New Arrivals 2018
		</h2>
	</section>
@include('layouts/FrontLayout/front_sidebar',compact('categories'))
	
	<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							@if($categoryname != "All Products")
							<h4 class="m-text14 p-b-7">
								{{$categoryname->name}}
							</h4>
							@endif
							
							@if($categoryname == "All Products")
							<h4 class="m-text14 p-b-7">
								{{$categoryname}}
							</h4>
							@endif
						</div>
					</div> 
					<!-- Product -->
					<div class="row">
                        @foreach($products as $product)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="{{asset('svg/backendImages/products/smallimage/'.$product->image)}}" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Add to Cart
											</button>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
								<a href="/productsdetail/{{$product->id}}" class="block2-name dis-block s-text3 p-b-5">
										{{$product->productname}}
									</a>

									<span class="block2-price m-text6 p-r-5">
										Rs.{{$product->price}}
									</span>
								</div>
							</div>
						</div>

						
@endforeach
					
				</div>
			</div>
		
	</section>
	@endsection	
