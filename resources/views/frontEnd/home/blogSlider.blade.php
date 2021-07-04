
<section class="section latest-blog outer-bottom-vs wow fadeInUp">
	<h3 class="section-title">latest form blog</h3>
	<div class="blog-slider-container outer-top-xs">
		<div class="owl-carousel blog-slider custom-carousel">
				

				@foreach($blogs as $blog)									
				<div class="item">
					<div class="blog-post">
						<div class="blog-post-image">
							<div class="image">
								<a href="blog.html"><img src="{{asset($blog->post_image)}}" alt=""></a>
							</div>
						</div><!-- /.blog-post-image -->
					
					
						<div class="blog-post-info text-justify">
							<h3 class="name"><a href="#">{{$blog->title}}</a></h3>	
							<span class="info">{{$blog->admin->name}} &nbsp;|&nbsp; 21 March 2016 </span>



							<p>
								   {{ substr(strip_tags($blog->description), 0,100,) }}

							@if (strlen($blog->description) > 100)
							        <span id="dots">...</span> 
							        <br>
							        <br>
							         <a href="{{route('blog.details',$blog->id)}}" class="lnk btn btn-primary">Read more</a>


							    @endif

							    
							</p>
							
						</div><!-- /.blog-post-info -->
						
						
					</div><!-- /.blog-post -->
				</div><!-- /.item -->
			
				@endforeach


						
		</div><!-- /.owl-carousel -->
	</div><!-- /.blog-slider-container -->
</section><!-- /.section -->