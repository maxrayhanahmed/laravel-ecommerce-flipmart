
						    <div class="pagination-container">
	
							@if ($blogs->lastPage() > 1)
							<ul class="pagination">
							    <li class="{{ ($blogs->currentPage() == 1) ? ' disabled' : '' }}">
							        <a href="{{ $blogs->url(1) }}"> < </a>
							    </li>
							    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
							        <li class="{{ ($blogs->currentPage() == $i) ? ' active' : '' }}">
							            <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
							        </li>
							    @endfor
							    <li class="{{ ($blogs->currentPage() == $blogs->lastPage()) ? ' disabled' : '' }}">
							        <a href="{{ $blogs->url($blogs->currentPage()+1) }}" > > </a>
							    </li>
							</ul>
							@endif
						</div><!-- /.pagination-container -->	

