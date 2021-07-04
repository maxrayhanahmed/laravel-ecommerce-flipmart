

@extends('frontEnd.master')

@section('mainContent')



<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Login</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Sign in</h4>
	<p class="">Hello, Welcome to your account.</p>
	<div class="social-sign-in outer-top-xs">
		<a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
		<a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
	</div>
	<form class="register-form outer-top-xs" role="form">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		</div>
	  	<div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
		</div>
		<div class="radio outer-xs">
		  	<label>
		    	<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Remember me!
		  	</label>
		  	<a href="#" class="forgot-password pull-right">Forgot your Password?</a>
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
		   <h3 class="text-success">{{Session::get('message')}}</h3>

	<h4 class="checkout-subtitle">Create a new account</h4>

	<p class="text title-tag-line">Create your new account.</p>



       {!! Form::open(['url'=>'/admin/store','class'=>'register-form outer-top-xs','method'=>'POST','enctype'=>'multipart/form-data'])!!}

		<div class="form-group">
	    	<label class="info-title" for="email">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" name="email" id="email" >
	    	<span class="text-danger">{{$errors->first('email')}}</span>
	  	</div>
        <div class="form-group">
		    <label class="info-title" for="name">Name <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" name="name" id="name" >
		    <span class="text-danger">{{$errors->first('name')}}</span>
		</div>
        <div class="form-group">
		    <label class="info-title" for="phone">Phone Number <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" name="phone" id="phone" >
		    <span class="text-danger">{{$errors->first('phone')}}</span>
		</div>
        <div class="form-group">
		    <label class="info-title" for="password">Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="password" id="password" >
		    <span class="text-danger">{{$errors->first('password')}}</span>
		</div>
		<div class="form-group">
		    <label class="info-title" for="con_password">Confirm Password <span>*</span></label>
		    <input type="password" class="form-control unicase-form-control text-input" name="con_password" id="con_password" >

	   		 <span class="text-danger">{{Session::get('con_bad_mess')}}	</span>

		    <span class="text-danger">{{$errors->first('con_password')}}</span>
		</div>


         <div class="form-group">
		    <label class="info-title" for="address">Address <span>*</span></label>
		    <textarea class="form-control unicase-form-control text-input" name="address" id="address" > </textarea>
		    <span class="text-danger">{{$errors->first('address')}}</span>
		</div>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
		{!!Form::close()!!}
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp logo-slider-inner">

		
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection