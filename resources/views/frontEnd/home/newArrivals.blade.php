
<section class="section wow fadeInUp new-arriavls">
	<h3 class="section-title">New Arrivals</h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
	    	
		
		@foreach($newProducts as $product)
		<div class="item item-carousel">
			<div class="products">   	
				@include('frontEnd.includes.product')
			</div>
		</div>
		
		@endforeach
	

	</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->