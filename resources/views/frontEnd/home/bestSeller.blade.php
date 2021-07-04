
<div class="best-deal wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">Best seller</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
	 

		@foreach($best_seller->chunk(1) as $product)


	  <div class="item">
<div class="products best-product">

	@foreach($product as $product)

				<div class="product">
				<div class="product-micro">
				<div class="row product-micro-row">
					<div class="col col-xs-5">
						<div class="product-image">
							<div class="image">
								<a href="{{route('product.details',$product->id)}}">
									<img src="{{asset($product->image[0]['product_image'])}}" alt="{{$product->title}}">
								</a>					
							</div><!-- /.image -->		
						</div><!-- /.product-image -->
					</div><!-- /.col -->
					<div class="col2 col-xs-7">
						<div class="product-info">
							<h3 class="name"><a href="{{route('product.details',$product->id)}}">{{$product->title}}</a></h3>
							<div class="rating rateit-small"></div>
							<div class="product-price">	
							<span class="price"> ${{$product->price}} </span>
							
						</div><!-- /.product-price -->
						
						</div>
					</div><!-- /.col -->
				</div><!-- /.product-micro-row -->
			</div><!-- /.product-micro -->
			      
									
			</div>
	        @endforeach



		  </div>
	    </div>

	        @endforeach


	    		    </div>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->