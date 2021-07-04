<div class="shopping-cart-table ">
	<div class="table-responsive">
		<form action="{{url('/update-cart')}}" method="post">
			@csrf
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
				</tr>
			</thead><!-- /thead -->
     
			
			<tbody>
				<?php $subTotal = 0; ?>

            @foreach($carts as $cartIteme) 


				<tr>
					<td class="romove-item">
							
						<a href="{{route('cart.remove',$cartIteme->id)}}" title="cancel" class=""><i class="fa fa-trash-o"></i></a>


					</td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="{{route('product.details',$cartIteme->id)}}">
						    <img src="{{asset($cartIteme->product->image[0]['product_image'])}}" alt="">
						</a>
					</td>
					<td class="cart-product-name-info">
						 <h4 class='cart-product-description'><a href="{{route('product.details',$cartIteme->id)}}">
							{{$cartIteme->product->title}}</a></h4>
						<div class="row">
							<div class="col-sm-4">
							<!---	<div class="rating rateit-small"></div>  --->
							</div>
							<div class="col-sm-8">
								<div class="reviews">
								<!---	(06 Reviews)  --->
								</div>
							</div>
						</div><!-- /.row -->
						<div class="cart-product-info">
											<span class="product-color">COLOR:
												<span></span>
											</span>
						</div>
					</td>
					
					<td class="cart-product-quantity">
						<div class="quant-input">
				                <div class="arrows">
				                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
				                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
				                </div>
				                <input type="text" name="qty[]" value="{{$cartIteme->product_qty}}">
				                <input type="hidden" name="id[]" value="{{$cartIteme->id}}">
			              </div>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"></span>
						{{$cartIteme->product_qty * $cartIteme->product->price}} Taka

						<?php 
						$subTotal += $cartIteme->product_qty * $cartIteme->product->price;
						?> 
					</td>
				</tr>

				@endforeach
			</tbody><!-- /tbody -->

			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="{{url('/')}}" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart
									
								</button>
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>


		</table><!-- /table -->
	</form>

	</div>
</div><!-- /.shopping-cart-table -->		

				
				