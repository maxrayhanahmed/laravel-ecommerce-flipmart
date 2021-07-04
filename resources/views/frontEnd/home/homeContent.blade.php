

@extends('frontEnd.master')



@section('title')
home
@endsection


@section('mainContent')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	@include('frontEnd.includes.sidebar')


	<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
		
	@if($homeSetting->is_slider==1)
		@include('frontEnd.home.homeSlider') 
	@endif
	@if($homeSetting->is_new_product==1)
		@include('frontEnd.home.newProducts')
	@endif


			<!-- ============================================== WIDE PRODUCTS ============================================== -->
			
<div class="wide-banners wow fadeInUp outer-bottom-xs">
	
</div><!-- /.wide-banners -->

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->

<!-- ============================================== FEATURED PRODUCTS ============================================== -->
	@if($homeSetting->is_featured_product==1)

	@include('frontEnd.home.featuredProducts')

	@endif

<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

			<!-- ============================================== WIDE PRODUCTS ============================================== -->
			

<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			<!-- ============================================== BEST SELLER ============================================== -->
	@if($homeSetting->is_bestSeller_product==1)


	@include('frontEnd.home.bestSeller')

	@endif
<!-- ============================================== BEST SELLER : END ============================================== -->	

			<!-- ============================================== BLOG SLIDER ============================================== -->
	@if($homeSetting->is_blog_post==1)

	@include('frontEnd.home.blogSlider')

	@endif



<!-- ============================================== BLOG SLIDER : END ============================================== -->	

			<!-- ============================================== FEATURED PRODUCTS ============================================== -->
	@if($homeSetting->is_newArrivals_product==1)

	@include('frontEnd.home.newArrivals')

	@endif



<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

		</div><!-- /.homebanner-holder -->
		<!-- ============================================== CONTENT : END ============================================== -->
		</div>
	</div>
</div>

@endsection
