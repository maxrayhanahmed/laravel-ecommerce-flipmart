	
	<div class="product">		
		<div class="product-image">
			<div class="image">
				<a href="{{route('product.details',$product->id)}}">
					<img  src="{{asset($product->image[0]['product_image'])}}" alt=""></a>
			</div><!-- /.image -->			

				@include('frontEnd.includes.tag')
		    
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="{{route('product.details',$product->id)}}">{{ substr(strip_tags($product->title), 0, 20) }}</a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					{{$product->price}}
				</span>
				<span class="price-before-discount">{{$product->price + 20/100}}</span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
			@include('frontEnd.includes.buttonGroup')




			</div><!-- /.product -->

