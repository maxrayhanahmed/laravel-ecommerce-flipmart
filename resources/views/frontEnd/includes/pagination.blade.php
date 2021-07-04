
						    <div class="pagination-container">
	
							@if ($products->lastPage() > 1)
							<ul class="pagination">
							    <li class="{{ ($products->currentPage() == 1) ? ' disabled' : '' }}">
							        <a href="{{ $products->url(1) }}"> < </a>
							    </li>
							    @for ($i = 1; $i <= $products->lastPage(); $i++)
							        <li class="{{ ($products->currentPage() == $i) ? ' active' : '' }}">
							            <a href="{{ $products->url($i) }}">{{ $i }}</a>
							        </li>
							    @endfor
							    <li class="{{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}">
							        <a href="{{ $products->url($products->currentPage()+1) }}" > > </a>
							    </li>
							</ul>
							@endif
						</div><!-- /.pagination-container -->	

