

@extends('frontEnd.master')

@section('title')
Category
@endsection
@section('mainContent')



<div class="body-content outer-top-xs" id="">
	<div class="container">
	<div class="row">
	@include('frontEnd.includes.sidebar')


	<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
					<!-- ========================================== SECTION – HERO ========================================= -->

	<div id="category" class="category-carousel hidden-xs">
		<div class="item">	
			<div class="image">
				<img src="{{asset('public/frontEnd')}}/picture/banners/cat-banner-1.jpg" alt="" class="img-responsive">
			</div>
			<div class="container-fluid">
				<div class="caption vertical-top text-left">
					<div class="big-text">
						Big Sale
					</div>

					<div class="excerpt hidden-sm hidden-md">
						Save up to 20% off
					</div>
                    <div class="excerpt-normal hidden-sm hidden-md">
						Lorem ipsum dolor sit amet, consectetur adipiscing elitp
					</div>
					
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div>
</div>

		

			
<!-- ========================================= SECTION – HERO : END ========================================= -->
@if($productsCount>0)

	<div class="clearfix filters-container m-t-10">
	<div class="row">
		<div class="col col-sm-6 col-md-2">
			<div class="filter-tabs">
				<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
					<li class="active">
						<a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a>
					</li>
					<li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
				</ul>
			</div><!-- /.filter-tabs -->
		</div><!-- /.col -->
		<div class="col col-sm-12 col-md-6">
			<div class="col col-sm-3 col-md-6 no-padding">
				
			</div><!-- /.col -->
			<div class="col col-sm-3 col-md-6 no-padding">
			
			</div><!-- /.col -->
		</div><!-- /.col -->
		<div class="col col-sm-6 col-md-4 text-right">
				@include('frontEnd.includes.pagination')
			

		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
<div class="search-result-container ">
<div id="myTabContent" class="tab-content category-list">
	<div class="tab-pane active " id="grid-container">
		<div class="category-product">
			<div class="row">	
		@foreach($products as $product)
										
		<div class="col-sm-6 col-md-4 wow fadeInUp">
			<div class="products">
				
				@include('frontEnd.includes.product')

			</div><!-- /.products -->
		</div><!-- /.item -->

		@endforeach

		
						</div><!-- /.row -->
			</div><!-- /.category-product -->
		
		</div><!-- /.tab-pane -->
			
		<div class="tab-pane "  id="list-container">
			<div class="category-product">
			
		@foreach($products as $product)
									
		<div class="category-product-inner wow fadeInUp">
			<div class="products">				
	            <div class="product-list product">
	<div class="row product-list-row">
		<div class="col col-sm-4 col-lg-4">
			<div class="product-image">
				<div class="image">
					<img src="{{asset($product->image[0]['product_image'])}}" alt="">
				</div>
			</div><!-- /.product-image -->
		</div><!-- /.col -->
		<div class="col col-sm-8 col-lg-8">
			<div class="product-info">
				<h3 class="name"><a href="{{route('product.details',$product->id)}}">{{$product->title}}</a></h3>
				<div class="rating rateit-small"></div>
				<div class="product-price">	
					<span class="price">
						{{$product->price}}					</span>

					<span class="price-before-discount">
						<?php $accuratePrice = $product->price;
				     echo $accuratePrice + 20/100 ?>
				 	
					</span>
											
				</div><!-- /.product-price -->
				<div class="description m-t-10">
					{{ substr(strip_tags($product->description), 0, 200) }}
				</div>
				@include('frontEnd.includes.buttonGroup')
               


			</div><!-- /.product-info -->	
		</div><!-- /.col -->
	</div><!-- /.product-list-row -->

				@include('frontEnd.includes.tag')
	       </div><!-- /.product-list -->
			</div><!-- /.products -->
		</div><!-- /.category-product-inner -->
		@endforeach



		
										
							</div><!-- /.category-product -->
						</div><!-- /.tab-pane #list-container -->
					</div><!-- /.tab-content -->
					<div class="clearfix filters-container">
						
					<div class="text-right">


				@include('frontEnd.includes.pagination')

											    </div><!-- /.text-right -->
						
					</div><!-- /.filters-container -->

				</div><!-- /.search-result-container -->
				@else
				<h4 class="text-center">There is no product for this category.</h4>
				@endif

			</div><!-- /.col -->

		</div>
	</div>
</div>
			
			
@endsection