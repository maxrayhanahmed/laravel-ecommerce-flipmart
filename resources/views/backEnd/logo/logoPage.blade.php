


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Logo</h2>
                    <h4 class="text-success">{{Session::get('success')}}</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">

       {!! Form::open(['route'=>'logo.update','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="col-md-4">
           
            <div class="form-group">
                <label for="logo_image">Logo Image : <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="logo_image" id="logo_image">
                <span class="text-danger">{{$errors->first('logo_image')}}</span>

            </div>
            <input type="hidden" name="logo_id" value="{{$logo_image->id}}">

            <div class="form-group">

            <img src="{{asset($logo_image->logo_image)}}" width="60px">
        </div>

            
            <div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
        </div>  
	{!!Form::close()!!}

    </div>
</div>
@endsection