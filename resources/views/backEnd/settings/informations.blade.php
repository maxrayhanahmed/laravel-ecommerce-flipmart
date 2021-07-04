


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Site Informations</h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

		<div class="row">
			{!! Form::open(['route'=>'site.information.update','method'=>'POST']) !!}

			@foreach($informations as $information)

			<div class="col-md-6">
				<div class="form-group">
					<label> Site Name <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="name" value="{{ $information->name}}">
						<input type="hidden" class="form-control" name="id" value="{{ $information->id}}">
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<label> Phone <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="phone" value="{{ $information->phone}}">
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<label> Email <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="email" value="{{ $information->email}}">
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<label> Address <span class="text-danger">*</span> :  </label>
						<textarea class="form-control" name="address">
							{{ $information->address}}
						</textarea> 
					<span class="text-danger"></span>
				</div>
				<div class="form-group">
					<label> Locotion Code <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="location_code" value="{{ $information->location_code}}">
					<span class="text-danger"></span>
				</div>


				<div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
			</div>
			@endforeach

			
			
			{!!Form::close()!!}
			
			
		</div>
	
</div>
@endsection