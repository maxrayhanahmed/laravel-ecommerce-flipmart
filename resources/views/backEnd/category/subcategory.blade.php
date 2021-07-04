


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	 @if(isset($subcatEdit))
	                		 Update Subcategory
	                 	 @else
	                   		Add Subcategory 
	              		 @endif
                    </h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">
    @if(isset($subcatEdit))
     <div class="col-md-4">

       {!! Form::open(['url'=>'/admin/subcategory-update','method'=>'POST','name'=>'subcatEdit','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="categoryId">Category : <span class="text-danger">*</span></label>
                <select class="form-control" name="categoryId" id="categoryId">
                	<option value="">Select</option>
                	@foreach($categories as $category)
                	   <option value="{{$category->id}}">{{$category->categoryName}}</option>
                	@endforeach
                </select>

               

            </div>
            <input type="hidden" value="{{$subcatEdit->id}}" name="editId">

            <div class="form-group">
                <label for="subcatName">Subcategory : <span class="text-danger">*</span></label>
                <input value="{{$subcatEdit->subcatName}}" class="form-control" name="subcatName" id="subcatName">
                <span class="text-danger">{{$errors->first('subcatName')}}</span>

            </div>
       
            <div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
			{!!Form::close()!!}

        </div>

        <script>
    		document.forms['subcatEdit'].elements['categoryId'].value="{{ $subcatEdit->categoryId}}";

		</script>
    @else
   <div class="col-md-4">

       {!! Form::open(['url'=>'/admin/subcategory-store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="categoryId">Category : <span class="text-danger">*</span></label>
                <select class="form-control" name="categoryId" id="categoryId">
                	<option value="">Select</option>
                	@foreach($categories as $category)
                	   <option value="{{$category->id}}">{{$category->categoryName}}</option>
                	@endforeach
                </select>

              
            </div>
        
            <div class="form-group">
                <label for="subcatName">Subcategory : <span class="text-danger">*</span></label>
                <input class="form-control" name="subcatName" id="subcatName">
                <span class="text-danger">{{$errors->first('subcatName')}}</span>

            </div>
            <div class="form-group">
                <label for="subcatCode">Subcategory Code : </label>
                <input class="form-control" name="subcatCode" id="subcatCode">
                <span class="text-danger">{{$errors->first('subcatCode')}}</span>


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
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Code</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($subcategories as $subcategory)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$subcategory->categoryName}}</td>
                                            <td>{{$subcategory->subcatName}}</td>
                                            <td>{{$subcategory->subcatCode}}</td>
                                            <td>
                                            <a href="{{url('admin/subcategory-edit/'.$subcategory->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{url('admin/subcategory-delete/'.$subcategory->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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