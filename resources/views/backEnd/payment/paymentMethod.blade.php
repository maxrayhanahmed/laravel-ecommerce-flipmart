


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
	                     @if(isset($paymentById))
	                		 Update Package
	                 	 @else
	                   		Add Package 
	              		 @endif
              		  </h2>
                    <h4 class="text-success">{{Session::get('message_form')}}</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

		<div class="row">

			@if(isset($paymentById))

		<!--- package edit section start --->

			{!! Form::open(['url'=>'/admin/payment-method/update','name'=>'paymentEdit','method'=>'POST']) !!}	
			<div class="col-md-4">


				<input type="hidden" class="form-control" name="paymentId"  value="{{$paymentById->id}}">


				<div class="form-group">
					<label for="name"> Name <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="name" id="name" value="{{$paymentById->name}}">
						<span class="text-danger">{{$errors->first('name')}}</span>
				</div>


			<div class="form-group">
					<label for="short_name"> Short Name <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="short_name" id="short_name" value="{{$paymentById->short_name}}">
						<span class="text-danger">{{$errors->first('short_name')}}</span>
				</div>

				
				<div class="form-group">
					<label for="no"> Acount Number : </label>
						<input class="form-control" name="no" id="no" value="{{$paymentById->no}}">
						<span class="text-danger">{{$errors->first('no')}}</span>
				</div>

				<div class="form-group">
					<label for="type"> Type : </label>
						<input class="form-control" name="type" id="type" value="{{$paymentById->type}}">
						<span class="text-danger">{{$errors->first('type')}}</span>
				</div>

				<div class="form-group">
					<label for="priority"> Priority :  <span class="text-danger">*</span></label>
						<input class="form-control" name="priority" id="priority" value="{{$paymentById->priority}}">
						<span class="text-danger">{{$errors->first('priority')}}</span>
				</div>

				<div class="form-group">
					<label for="image"> Image :  </label>
									<img height="60px" src="{{asset($paymentById->image)}}">

						<input type="file" class="" name="image" id="image">
						<span class="text-danger">{{$errors->first('image')}}</span>

				</div>



				<div class="mt-5">
	            	<button class="btn btn-info mt-5" type="submit">Update</button>
	            </div>	
	            </div>
	
	            	{!!Form::close()!!}


			
		@else


		<!--- package Edit section start --->

		<!--- package add section start --->

			<div class="col-md-4">
				{!! Form::open(['url'=>'/admin/payment/store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}	



				
				<div class="form-group">
					<label for="name"> Name <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="name" id="name">
						<span class="text-danger">{{$errors->first('name')}}</span>
				</div>


			<div class="form-group">
					<label for="short_name"> Short Name <span class="text-danger">*</span> :  </label>
						<input class="form-control" name="short_name" id="short_name">
						<span class="text-danger">{{$errors->first('short_name')}}</span>
				</div>

				
				<div class="form-group">
					<label for="no"> Acount Number : </label>
						<input class="form-control" name="no" id="no">
						<span class="text-danger">{{$errors->first('no')}}</span>
				</div>

				<div class="form-group">
					<label for="type"> Type : </label>
						<input class="form-control" name="type" id="type">
						<span class="text-danger">{{$errors->first('type')}}</span>
				</div>

				<div class="form-group">
					<label for="priority"> Priority :  </label>
						<input class="form-control" name="priority" id="priority">
						<span class="text-danger">{{$errors->first('priority')}}</span>
				</div>

				<div class="form-group">
					<label for="image"> Image :  </label>
						<input type="file" class="" name="image" id="image">
						<span class="text-danger">{{$errors->first('image')}}</span>
				</div>

				


				<div class="mt-5">
	            	<button class="btn btn-info mt-5" type="submit">Submit</button>
	            </div>
			{!!Form::close()!!}

			</div>

		<!--- package add section end --->


			@endif

			
			   <div class="col-md-8">
                    <div class="panel panel-default">

					<div class="panel-heading">
                            <h4 class="text-success">
							{{Session::get('message_list')}}</h4>
                        </div>
					

                            

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Short Name</th>
                                            <th>Acount no</th>
                                            <th>Priority</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>


									<?php 
                                	$i=1;
                                	 ?>
									@foreach($payments as $payment)

                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$payment->name}}</td>
                                            <td>{{$payment->short_name}}</td>
                                            <td>{{$payment->no}}</td>
                                            <td>{{$payment->priority}}</td>
                                            <td> <img height="60px" src="{{asset($payment->image)}}"></td>
                                            <td>
											<a href="{{url('admin/payment-method/'.$payment->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{url('admin/payment-method/delete/'.$payment->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-remove"></i>
                                                </a>
											</td>
                                        </tr>
										@endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
			
		</div>
	
</div>



@endsection