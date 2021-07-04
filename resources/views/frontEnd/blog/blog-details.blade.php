

@extends('frontEnd.master')

@section('title')
Blog details
@endsection
@section('mainContent')

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-9">
					<div class="blog-post wow fadeInUp">
	<img class="img-responsive" src="{{asset($blog->post_image)}}" alt="">
	<h1>{{$blog->title}}</h1>
	<span class="author">{{$blog->admin->name}}</span>
	<span class="review">Nn Comment</span>
	<span class="date-time">{{$blog->updated_at}}</span>
			{{strip_tags($blog->description)}}
	<div class="social-media">
		<span>share post:</span>
		<a href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup"><i class="fa fa-facebook"></i></a>
		<a href="#"><i class="fa fa-twitter"></i></a>
		<a href="#"><i class="fa fa-linkedin"></i></a>
		<a href="#"><i class="fa fa-rss"></i></a>
		<a href="#" class="hidden-xs"><i class="fa fa-pinterest"></i></a>
	</div>
</div>



<!----	@include('frontEnd.includes.blog-comments') -->

	<!----  @include('frontEnd.includes.blog-comment-form') -->
				</div>



	@include('frontEnd.blog.blog-sidebar')



			</div>
		</div>
	</div>
</div>

@endsection