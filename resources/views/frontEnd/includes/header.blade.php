
		
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					@if(Auth::user())
					<li>
						<a href="{{ route('user.account') }}"><i class="icon fa fa-user"></i> {{ __('My Account') }}</a>
					</li>
					@else
					<li>
						<a href="{{ route('user.register.form') }}"><i class="icon fa fa-user"></i> {{ __('User Registation') }}</a>
					</li>
					@endif
					<li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="{{route('user.cart')}}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="{{route('checkout')}}"><i class="icon fa fa-check"></i>Checkout</a></li>
					@if(!Auth::user())

					<li><a href="{{route('login')}}"><i class="icon fa fa-lock"></i>Login</a></li>
					@else

					<li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                       @csrf
                              <input type="submit" value="Logout" class="" type="submit"><i class="icon fa fa-lock"></i> >

                        </form>
						
					</li>
						@endif

					
				</ul>
			</div><!-- /.cnt-account -->

			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<div class="logo">
	<a href="home.html">
		<img src="{{asset($logo->logo_image)}}" alt="">

	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
        <div class="control-group">



            <form action="{{route('search.product')}}" method="POST" >
            {{ csrf_field() }}
            	<input type="text" class="search-field" name="post_search"
			            placeholder="Search users">

           		 <button class="search-button" type="submit"></button>    

            </form>

        </div>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
            <div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count">

				  {{$shopping_cart->totalItems()}}
			

				 </span></div>
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="value">{{ $shopping_cart->total() }}<span class="sign">Taka</span>
</span>
					</span>
				</div>
				
			




		    </div>
		</a>
		<ul class="dropdown-menu">
			
			<li>
				

			@foreach($cartItemes as $cartIteme) 


				<div class="cart-item product-summary">
					
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img src="{{asset($cartIteme->product->image[0]['product_image'])}}" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="index8a95.html?page-detail">{{$cartIteme->product->title}}</a></h3>
							<div class="price">{{$cartIteme->product_qty * $cartIteme->product->price}} Taka</div>
						</div>
						<div class="col-xs-1 action">
							<a href="{{route('cart.remove',$cartIteme->id)}}"><i class="fa fa-trash"></i></a>
						</div>
					</div>

				</div><!-- /.cart-item -->
				<br>
		@endforeach 

				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text">Sub Total :</span><span class='price'>{{ $shopping_cart->subTotal() }}</span>
						
				</div>
				<div class="clearfix"></div>
					
				<a href="{{route('checkout')}}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
			</div><!-- /.cart-total-->
					
				
		</li>

		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">
                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
	<div class="nav-outer">
		<ul class="nav navbar-nav">
			<li class=" dropdown yamm-fw {{ request()->is('/') ? 'active' : '' }}">
				<a href="{{route('user.home')}}">Home </a>
				
				@foreach($categories as $category)

			<li class="dropdown {{ (\Request::route()->getName() == 'this.route') ? 'active' : '' }}">
				<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">{{$category->categoryName}}</a>
				<ul class="dropdown-menu pages">
					<li>
						<div class="yamm-content">
							<div class="row">
								
									<div class="col-xs-12 col-menu">
	                                  <ul class="links">
				
					 				 @foreach($category->subCat as $subcategory)


		                                  	<li><a href="{{route('category.page',$subcategory->id)}}">{{$subcategory->subcatName}}</a></li>
		                              @endforeach




	                                  </ul>
									</div>
									
									
								
							</div>
						</div>
					</li>
                    
                   
					
				</ul>
			</li>
			@endforeach
			
		  @foreach($subcategories as $subcategory)


            <li class="dropdown">
				<a href="{{route('category.page',$subcategory->id)}}">{{$subcategory->subcatName}}</a>
			</li>
			@endforeach

			<li class="dropdown {{ request()->is('contact') ? 'active' : '' }}">
				<a href="{{route('contact.page')}}">Contact</a>
			</li>

            
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>				
	</div><!-- /.nav-outer -->
</div><!-- /.navbar-collapse -->


            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

</header>


