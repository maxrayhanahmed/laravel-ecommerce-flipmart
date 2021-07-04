

@extends('frontEnd.master')

@section('mainContent')




<div class="body-content outer-top-xs">
	@if($cartCount<=0)
	@include('frontEnd.includes.noData')

		
	@else
	<div class="container">


		<div class="row ">
		<div class="shopping-cart">
	@include('frontEnd.cart.cartProducts')
	

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 estimate-ship-tax">
	
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-sub-total">
						Subtotal<span class="inner-left-md"> 
						<?php $flights =new App\ShoppingCart; ?>
				        {{$flights->subTotal()}}
				         Taka </span>

					</div>
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">{{ $flights->total() }} Taka</span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<a href="{{route('checkout')}}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->
			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->

		


		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
				@endif

</div><!-- /.body-content -->


@endsection