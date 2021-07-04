

@extends('frontEnd.master')

@section('mainContent')


<div class="container">
  <h2>Products</h2>
	<div class="shopping-cart ">
	@include('frontEnd.cart.cartProducts')

	</div>
</div>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          <span>1</span>Checkout Method
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOnexxx" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

			
				<!-- already-registered-login -->
				<div class="col-md-6 col-sm-6 already-registered-login">
					<form action="{{ route('checkout.store') }}" method="post">
						@csrf
					<div class="form-group">
					    <label class="info-title" for="name">Name <span>*</span></label>
					    <input type="text" name="name" 
					    value="
					    @if (Auth::user())
 							{{Auth::user()->firstName}}
					    @endif
					    " class="form-control unicase-form-control text-input" id="name" placeholder="">
					    <span class="text-danger"> 
                   			{{$errors->first('firstName')}}
                        </span>
					 </div>

					 <div class="form-group">
					    <label class="info-title" for="phone">Phone <span>*</span></label>
					    <input type="text" name="phone" 
					    value="
					    @if (Auth::user())
 							{{Auth::user()->phone}}
					    @endif
					    " class="form-control unicase-form-control text-input" id="phone" placeholder="">
					    <span class="text-danger"> 
                   			 {{$errors->first('phone')}}
                		</span>
					 </div>
					 @if (Auth::user())
					 	<input type="hidden" name="user_id" value="{{Auth::user()->id}}">

					    @endif


					 <div class="form-group">
					    <label class="info-title" for="email">Email </label>
					    <input type="email" name="email" value="
					    @if (Auth::user())
 							{{Auth::user()->email}}
					    @endif
					    " class="form-control unicase-form-control text-input" id="email" placeholder="">
					    <span class="text-danger"> 
                   			 {{$errors->first('email')}}
              			  </span>
					 </div>
					 <div class="form-group">
					    <label class="info-title" for="name">Shipping Address </label>
					    <textarea type="text" name="shipping_address"class="form-control unicase-form-control text-input" id="name">
						@if (Auth::user())
 							{{Auth::user()->address}}
					   @endif
					     </textarea>
					     <span class="text-danger"> 
                   			 {{$errors->first('address')}}
                		</span>
					 </div>
					  <div class="form-group">
					    <label class="info-title" for="payment_id">Shipping Method 22</label>
					    <select name="payment_id" id="payment_id" class="form-control">
					    	<option value="">Select </option>
					    	@foreach($paymentMethods as $payment)
					    	<option value="{{$payment->id}}">{{$payment->short_name}}
					    		@if(!$payment->no==null)
					    	 , Type: {{$payment->type}}, No: {{$payment->no}}

					    	 @endif

					    	</option>
					    	@endforeach


					    </select>
					    <span class="text-danger"> 
                    		{{$errors->first('payment_id')}}
               			 </span>

					  
					 
					 
					 </div>
					 <div class="form-group">
					    <label class="info-title payment_method" for="reference_id">Reffarence ID </label>
					    	
					    <input type="text" name="reference_id" class="form-control unicase-form-control text-input" id="reference_id" placeholder="">
					   
					 </div>

					 
					  <button type="submit" name="submit" class="btn-upper btn btn-primary checkout-page-button">checkout</button>
					</form>
				</div>	
				<!-- already-registered-login -->		

			</div>	
		</div>


		<!-- panel-body  -->

	</div><!-- row -->


</div>
<!-- checkout-step-01  -->

					   
					  	
					</div><!-- /.checkout-steps -->
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->

</div><!-- /.body-content -->
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	/*
$(document).ready(function(){

    $(".payment_id").change(function() {
    if(( $('option:selected', this).text() ==='Active' )){
       //  console.log('Active')
   // $(".payment_method").show();
   alert('ssffjf');

        }else{
        	//console.log('Deactivated')
    $(".payment_method").show();

        }
    });
    
   $(".payment_method").hide();

});


$(function() {
    $(".category_select").change(function() {
    if(( $('option:selected', this).text() =='Active' )){
         console.log('Active')
        }else{console.log('Deactivated')}
    });
});

//////

*/

</script>

@endsection

