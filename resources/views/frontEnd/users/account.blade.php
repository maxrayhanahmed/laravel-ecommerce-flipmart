
@extends('frontEnd.master')


@section('css')
<style type="text/css">
	.clint-image img{
		border-radius: 50%;
		width: 250px;
		height: auto;
	}s
	.client-details{
		font-size: 18px;
	}
</style>
@endsection

@section('mainContent')

    @if(Auth::user())

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
<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 create-new-account">
           <h3 class="text-success">{{Session::get('message')}}</h3>
                   	<div class="text-right"><a href="{{route('user.account.edit')}}" class="btn btn-info" >Edit Information</a></div>


           <div class="clint-image text-center">
        		
        	
        		<img class="img-thumbnail rounded-circle" src="{{asset('public/backEnd/images/no_image.png')}}"> 
        		

        	</div>
        	<p>
            	 <h3 class=""><b>First Name : </b> 
            	 		@if (Auth::user())
 							{{Auth::user()->firstName}}
					    @endif</h3>
            	 <h3 class=""><b>Last Name : </b> {{Auth::user()->lastName}}</h3>
            	 <h3 class=""><b>Phone : </b> {{Auth::user()->phone}}</h3>
            	 <h3 class=""><b>Email : </b> {{Auth::user()->email}}</h3>
            	 <h3 class=""><b>Address : </b> {{Auth::user()->address}}</h3>
            	</p>
            	
    
</div>  
<!-- create a new account -->           </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp logo-slider-inner">

        
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->    </div><!-- /.container -->
</div><!-- /.body-content -->
@endif

@endsection