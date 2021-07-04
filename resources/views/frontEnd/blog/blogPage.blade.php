

@extends('frontEnd.master')

@section('title')
Blog
@endsection
@section('mainContent')

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">

	@foreach($blogs as $blog)
					<div class="blog-post {{ $loop->first ? '' : 'outer-top-bd' }}  wow fadeInUp">
	<a href="{{route('blog.details',$blog->id)}}"><img class="img-responsive" src="{{asset($blog->post_image)}}" alt=""></a>
	<h1><a href="{{route('blog.details',$blog->id)}}">{{$blog->title}}</a></h1>
	<span class="author">{{$blog->admin->name}}</span>
	<span class="review">6 Comments</span>
	<span class="date-time">14/06/2016 10.00AM</span>
	<p>
	{{substr(strip_tags($blog->description),0,300)}}
	</p>
	<a href="{{route('blog.details',$blog->id)}}" class="btn btn-upper btn-primary read-more">read more</a>
</div>

@endforeach


<div class="clearfix blog-pagination filters-container  wow fadeInUp" style="padding:0px; background:none; box-shadow:none; margin-top:15px; border:none">
						
	<div class="text-right">
	@include('frontEnd.includes.blog-pagination')
  
   </div><!-- /.text-right -->

</div><!-- /.filters-container -->
				</div>

	@include('frontEnd.blog.blog-sidebar')
			</div>
		</div>

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div>
</div>


@endsection