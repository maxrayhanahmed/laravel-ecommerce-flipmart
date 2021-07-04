		
		@if($product->type == 1)
			<div class="tag new"><span>new</span></div> 
			@elseif($product->type == 2)
			<div class="tag hot"><span>hot</span></div>	
			@elseif($product->type == 3)
				<div class="tag sale"><span>sale</span></div>
			@endif
		
