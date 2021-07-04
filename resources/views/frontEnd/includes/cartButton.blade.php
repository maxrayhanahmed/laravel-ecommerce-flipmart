						
	<li class="add-cart-button btn-group">
		
		<form action="{{route('add.cart')}}"  method="post">
			@csrf
			<input type="hidden" name="product_id" value="{{$product->id}}">
			<input type="hidden" name="product_qty" value="1">
			<button data-toggle="tooltip" title="Add Cart" class="btn btn-primary icon" type="submit"><i class="fa fa-shopping-cart"></i>	</button>
			
		</form>						
	</li>