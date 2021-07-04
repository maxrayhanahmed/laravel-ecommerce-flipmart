
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

<!-- create a new account -->
<div class="col-md-6 col-sm-6 create-new-account">
		   <h3 class="text-success">{{Session::get('message')}}</h3>

	<h4 class="checkout-subtitle">Create a new account</h4>

	<p class="text title-tag-line">Create your new account.</p>



	       <form method="POST" action="{{ route('user.register')}}">
	                        @csrf
       		<div class="form-group"> 
          	    	<label class="info-title" for="firstName">First Name ( User Name ) <span>*</span></label>


                <input id="firstName" type="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName">

                @error('firstName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>


        
		<div class="form-group"> 
          	    	<label class="info-title" for="lastName">Last Name </label>


                <input id="lastName" type="lastName" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName">

                @error('lastName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>


        


        <div class="form-group"> 
          	    	<label class="info-title" for="phone"> Phone <span>*</span></label>
 

                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

		<div class="form-group"> 
          	    	<label class="info-title" for="email">Email Address <span>*</span> </label>


                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>


         <div class="form-group">
		    <label class="info-title" for="address">Address </label>
		     <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="{{ __('Customer Address') }}" required autocomplete="address"></textarea>

                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
		</div>


		 <div class="form-group">
          	    	<label class="info-title" for="email">Password <span>*</span> </label>

           
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
    	<label class="info-title" for="email">Confirm password <span>*</span> </label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>

	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign Up</button>
	  </form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp logo-slider-inner">

		
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection