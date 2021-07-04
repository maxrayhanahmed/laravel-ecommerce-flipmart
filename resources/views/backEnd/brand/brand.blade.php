


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	 @if(isset($brandById))
	                		 Update Brand
	                 	 @else
	                   		Add Brand 
	              		 @endif
                    </h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">
    @if(isset($brandById))
     <div class="col-md-4">

       {!! Form::open(['route'=>'admin.brand.update','method'=>'POST',])!!}
           <div class="form-group">
                <label for="name">Brand Name : <span class="text-danger">*</span></label>
                <input class="form-control" name="name" id="name" value="{{$brandById->name}}">
                <span class="text-danger">{{$errors->first('name')}}</span>

            </div>
            <input type="hidden" name="edited_id"  value="{{$brandById->id}}">


            <div class="form-group">
                <label for="code">Brand Code : </label>
                <input class="form-control" name="code" id="code" value="{{$brandById->code}}">
                <span class="text-danger">{{$errors->first('code')}}</span>

            </div>

        
            <div class="form-group">
                <label for="details">Details : </label>
                <textarea class="form-control" name="details" id="details">
                	{{$brandById->details}}
                </textarea>

            </div>
       
            <div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
			{!!Form::close()!!}

        </div>
    @else
    <div class="col-md-4">

      
 {!! Form::open(['route'=>'admin.brand.store','method'=>'POST'])!!}
            <div class="form-group">
                <label for="name">Brand Name : <span class="text-danger">*</span></label>
                <input class="form-control" name="name" id="name">
                <span class="text-danger">{{$errors->first('name')}}</span>

            </div>


            <div class="form-group">
                <label for="code">Brand Code : </label>
                <input class="form-control" name="code" id="code" >
                <span class="text-danger">{{$errors->first('code')}}</span>

            </div>

        
            <div class="form-group">
                <label for="details">Details : </label>
                <textarea class="form-control" name="details" id="details">
                </textarea>

            </div>
       
            <div class="">
            <button class="btn btn-info" type="submit">Save</button>
            </div>
			{!!Form::close()!!}
        </div>

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
                                            <th> Name</th>
                                            <th> Code</th>
                                            <th> Details</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($brands as $brand)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$brand->name}}</td>
                                            <td>{{$brand->code}}</td>
                                            <td>{{$brand->details}}</td>
                                            <td>
                                            <a href="{{url('admin/brand/edit/'.$brand->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{url('admin/brand/delete/'.$brand->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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