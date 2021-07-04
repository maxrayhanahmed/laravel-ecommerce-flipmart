


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Site Title</h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

		<div class="row">
			{!! Form::open(['url'=>'/admin/title/update','method'=>'POST']) !!}
	
			<div class="col-md-6">
				<div class="form-group">
					<label> Title <span class="text-danger">*</span> :  </label>
					@foreach($siteTitles as $siteTitle)
						<input class="form-control" name="siteTitle" value="{{ $siteTitle->siteTitle}}">
						<input type="hidden" class="form-control" name="id" value="{{ $siteTitle->id}}">

					@endforeach

					<span class="text-danger"></span>

				</div>
				<div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
			</div>
			
			
			{!!Form::close()!!}
			
			
		</div>
	
</div>
@endsection