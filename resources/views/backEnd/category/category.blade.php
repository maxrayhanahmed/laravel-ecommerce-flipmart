


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	 @if(isset($categoryEdit))
	                		 Update Category
	                 	 @else
	                   		Add Category 
	              		 @endif
                    </h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">
    @if(isset($categoryEdit))
     <div class="col-md-4">

       {!! Form::open(['url'=>'/admin/category-update','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="categoryName">Category : <span class="text-danger">*</span></label>
                <input class="form-control" name="categoryName" id="categoryName" value="{{ $categoryEdit->categoryName}}">
                <span class="text-danger"> 
                    {{$errors->first('categoryName')}}
                </span>

            </div>

            <input type="hidden" class="form-control" name="editId" value="{{ $categoryEdit->id}}">

        
            <div class="form-group">
                <label for="categoryDetails">Details : </label>
                <textarea class="form-control" name="categoryDetails" id="categoryDetails">{{ $categoryEdit->categoryDetails}}</textarea>
                <span class="text-danger">{{$errors->first('categoryDetails')}}</span>

            </div>
       
            <div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
			{!!Form::close()!!}

        </div>
    @else
    <div class="col-md-4">

       {!! Form::open(['url'=>'/admin/category-store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="categoryName">Category : <span class="text-danger">*</span></label>
                <input class="form-control" name="categoryName" id="categoryName">
                <span class="text-danger">{{$errors->first('categoryName')}}</span>

            </div>
        
            <div class="form-group">
                <label for="categoryDetails">Details : </label>
                <textarea class="form-control" name="categoryDetails" id="categoryDetails"></textarea>
                <span class="text-danger">{{$errors->first('categoryDetails')}}</span>

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
                                            <th>Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($categories as $category)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$category->categoryName}}</td>
                                            <td>
                                            <a href="{{url('admin/category-edit/'.$category->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{url('admin/category/delete/'.$category->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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