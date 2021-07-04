<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				 @foreach(Request::segments() as $segment)
			    
			        <li class='active'>{{$segment}}</li>
			    
			    @endforeach

			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->