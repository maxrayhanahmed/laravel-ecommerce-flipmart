


@extends('backEnd.master')
@section('css')

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

a.switch_on , .slider_on {
  background-color: #2196F3;
}

a.switch_on , .slider_on {
  box-shadow: 0 0 1px #2196F3;
}

a.switch_on , .slider_on:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

@endsection
@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Home Settions</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

		<div class="row">
			<div class="col-md-6">
			<div class="switch-section">
			{!! Form::open(['route'=>'admin.slider.setting.update','method'=>'POST']) !!}


				<div class="">
					<h4>
						{{ $homeSettings->is_slider == "1" ? "Slider Option ON" : "Slider Option OFF" }}
					</h4>
					@if($homeSettings->is_slider == "1" )
					<label class="switch">
						<a href="{{route('admin.slider.switch.setting')}}" class="switch_on">
						<span class="slider round slider_on"></span>

						</a>
					
					</label>
					@endif
					@if($homeSettings->is_slider == "0" )

					<label class="switch">
						<a href="{{route('admin.slider.switch.setting')}}">
							  <span class="slider round"></span>
						</a>
					
					</label>

					@endif


				</div>
					@if($homeSettings->is_slider == 1)

						<div class="form-group">
							<label>Slide Limit </label>

						  <input type="number" name="slider_limit" class="form-control" value="{{$homeSettings->slider_limit}}">

							<span class="text-danger"></span>

						</div>
						<input type="hidden" name="id" value="{{ $homeSettings->id}}">

						<button type="submit" class="btn btn-info">Slider Update</button>

						@endif

			{!!Form::close()!!}
				
				</div>
			</div>	
		</div>
		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
			<div class="switch-section">
			{!! Form::open(['route'=>'admin.new_product.setting.update','method'=>'POST']) !!}


				<div class="">
					<h4>
						{{ $homeSettings->is_new_product == "1" ? "New Product Option ON" : "New Product Option OFF" }}
					</h4>
					@if($homeSettings->is_new_product == "1" )
					<label class="switch">
						<a href="{{route('admin.new_product.switch.setting')}}" class="switch_on">
						<span class="slider round slider_on"></span>

						</a>
					
					</label>
					@endif
					@if($homeSettings->is_new_product == "0" )

					<label class="switch">
						<a href="{{route('admin.new_product.switch.setting')}}">
							  <span class="slider round"></span>
						</a>
					
					</label>

					@endif


				</div>
					@if($homeSettings->is_new_product == 1)

						<div class="form-group">
							<label>Slide Limit </label>

						  <input type="number" name="new_product_limit" class="form-control" value="{{$homeSettings->new_product_limit}}">

							<span class="text-danger"></span>

						</div>
						<input type="hidden" name="id" value="{{ $homeSettings->id}}">

						<button type="submit" class="btn btn-info">New Product</button>

						@endif

			{!!Form::close()!!}
				
				</div>
			</div>	
		</div>

		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
			<div class="switch-section">


				<div class="">
					<h4>
						{{ $homeSettings->is_featured_product == "1" ? "Feature Product Option ON" : "Feature Product Option OFF" }}
					</h4>
					@if($homeSettings->is_featured_product == "1" )
					<label class="switch">
						<a href="{{route('admin.featured_product.switch.setting')}}" class="switch_on">
						<span class="slider round slider_on"></span>

						</a>
					
					</label>
					@endif
					@if($homeSettings->is_featured_product == "0" )

					<label class="switch">
						<a href="{{route('admin.featured_product.switch.setting')}}">
							  <span class="slider round"></span>
						</a>
					
					</label>

					@endif


				</div>
					@if($homeSettings->is_featured_product == 1)

				{!! Form::open(['route'=>'admin.featured_product.setting.update','method'=>'POST']) !!}

						<div class="form-group">
							<label>Slide Limit </label>

						  <input type="number" name="featured_product_limit" class="form-control" value="{{$homeSettings->featured_product_limit}}">

							<span class="text-danger"></span>

						</div>
						<input type="hidden" name="id" value="{{ $homeSettings->id}}">

						<button type="submit" class="btn btn-info">Feature Product</button>

				{!!Form::close()!!}

						@endif

				
				</div>
			</div>	
		</div>


		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
			<div class="switch-section">


				<div class="">
					<h4>
						{{ $homeSettings->is_bestSeller_product == "1" ? "Best seller Product Option ON" : "Best seller Product Option OFF" }}
					</h4>
					@if($homeSettings->is_bestSeller_product == "1" )
					<label class="switch">
						<a href="{{route('admin.bestSeller_product.switch.setting')}}" class="switch_on">
						<span class="slider round slider_on"></span>

						</a>
					
					</label>
					@endif
					@if($homeSettings->is_bestSeller_product == "0" )

					<label class="switch">
						<a href="{{route('admin.bestSeller_product.switch.setting')}}">
							  <span class="slider round"></span>
						</a>
					
					</label>

					@endif


				</div>
					@if($homeSettings->is_bestSeller_product == 1)

				{!! Form::open(['route'=>'admin.bestSeller_product.setting.update','method'=>'POST']) !!}

						<div class="form-group">
							<label>Slide Limit </label>

						  <input type="number" name="bestSeller_product_limit" class="form-control" value="{{$homeSettings->bestSeller_product_limit}}">

							<span class="text-danger"></span>

						</div>
						<input type="hidden" name="id" value="{{ $homeSettings->id}}">

						<button type="submit" class="btn btn-info">Feature Product</button>

				{!!Form::close()!!}

						@endif

				
				</div>
			</div>	
		</div>

		<br>
		<br>
		<div class="row">
			<div class="col-md-6">
			<div class="switch-section">


				<div class="">
					<h4>
						{{ $homeSettings->is_blog_post == "1" ? "Blog post Option ON" : "Blog post Option OFF" }}
					</h4>
					@if($homeSettings->is_blog_post == "1" )
					<label class="switch">
						<a href="{{route('admin.blog_post.switch.setting')}}" class="switch_on">
						<span class="slider round slider_on"></span>

						</a>
					
					</label>
					@endif
					@if($homeSettings->is_blog_post == "0" )

					<label class="switch">
						<a href="{{route('admin.blog_post.switch.setting')}}">
							  <span class="slider round"></span>
						</a>
					
					</label>

					@endif


				</div>
					@if($homeSettings->is_blog_post == 1)

				{!! Form::open(['route'=>'admin.blog_post.setting.update','method'=>'POST']) !!}

						<div class="form-group">
							<label>Slide Limit </label>

						  <input type="number" name="blog_post_limit" class="form-control" value="{{$homeSettings->blog_post_limit}}">

							<span class="text-danger"></span>

						</div>
						<input type="hidden" name="id" value="{{ $homeSettings->id}}">

						<button type="submit" class="btn btn-info">Blog Post Limit</button>

				{!!Form::close()!!}

						@endif

				
				</div>
			</div>	
		</div>

	<br>
		<br>
		<div class="row">
			<div class="col-md-6">
			<div class="switch-section">


				<div class="">
					<h4>
						{{ $homeSettings->is_newArrivals_product == "1" ? "New Arrivals Product Option ON" : "New Arrivals Product Option OFF" }}
					</h4>
					@if($homeSettings->is_newArrivals_product == "1" )
					<label class="switch">
						<a href="{{route('admin.arrivals.switch.setting')}}" class="switch_on">
						<span class="slider round slider_on"></span>

						</a>
					
					</label>
					@endif
					@if($homeSettings->is_newArrivals_product == "0" )

					<label class="switch">
						<a href="{{route('admin.arrivals.switch.setting')}}">
							  <span class="slider round"></span>
						</a>
					
					</label>

					@endif


				</div>
					@if($homeSettings->is_newArrivals_product == 1)

				{!! Form::open(['route'=>'admin.arrivals.setting.update','method'=>'POST']) !!}

						<div class="form-group">
							<label>Slide Limit </label>

						  <input type="number" name="newArrivals_product_limit" class="form-control" value="{{$homeSettings->newArrivals_product_limit}}">

							<span class="text-danger"></span>

						</div>
						<input type="hidden" name="id" value="{{ $homeSettings->id}}">

						<button type="submit" class="btn btn-info">Arrivals Product Limit</button>

				{!!Form::close()!!}

						@endif

				
				</div>
			</div>	
		</div>



	
</div>
@endsection
