


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	 @if(isset($stockById))
	                		 Update Category
	                 	 @else
	                   		Add Stock 
	              		 @endif
                    </h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">

        @if(isset($stockById))


      <div class="col-md-4">

       {!! Form::open(['url'=>'/admin/stock/update','name'=>'editedform','method'=>'POST','enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="subcatId">Category : <span class="text-danger">*</span></label>
                <select class="form-control" name="subcatId" id="subcatId">
                    <option value="">Select</option>
                    @foreach($subcategories as $subcategory)
                       <option value="{{$subcategory->id}}">{{$subcategory->subcatName}}</option>
                    @endforeach
                </select>

                <span class="text-danger">{{$errors->first('subcatId')}}</span>

            </div>

            <input  value="{{$stockById->id}}" type="hidden" name="editedId">

        
            <div class="form-group">
                <label for="stockQue">Quentity : <span class="text-danger">*</span></label>
                <input  value="{{$stockById->stockQue}}" type="number" class="form-control" name="stockQue" id="stockQue">
                <span class="text-danger">{{$errors->first('stockQue')}}</span>

            </div>
            <div class="form-group">
                <label for="stockImage">Image : </label>
                <input type="file" class="form-control" name="stockImage" id="stockImage">

            </div>
            @if(!empty($stockById->stockImage))
            <img width="60" height="60" src="{{asset($stockById->stockImage)}}">
            @endif
       
            <div class="">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
            {!!Form::close()!!}

        </div>
        <script>
            document.forms['editedform'].elements['subcatId'].value="{{ $stockById->subcatId}}";

        </script>


        @else
    
      <div class="col-md-4">

       {!! Form::open(['url'=>'/admin/stock/store','method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
            <div class="form-group">
                <label for="subcatId">Category : <span class="text-danger">*</span></label>
                <select class="form-control" name="subcatId" id="subcatId">
                	<option value="">Select</option>
                	@foreach($subcategories as $subcategory)
                	   <option value="{{$subcategory->id}}">{{$subcategory->subcatName}} | ({{$subcategory->subcatCode}})</option>
                	@endforeach
                </select>

                <span class="text-danger">{{$errors->first('subcatId')}}</span>

            </div>
        
            <div class="form-group">
                <label for="stockQue">Quentity : <span class="text-danger">*</span></label>
                <input type="number" class="form-control" name="stockQue" id="stockQue">
                <span class="text-danger">{{$errors->first('stockQue')}}</span>

            </div>
            <div class="form-group">
                <label for="stockImage">Image : </label>
                <input type="file" class="form-control" name="stockImage" id="stockImage">

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
                                            <th>Subcategory</th>
                                            <th>Code</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($productStocks as $productStock)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$productStock->subcatName}} | ({{$productStock->subcatCode}})</td>
                                            <td>{{$productStock->stockQue}}</td>
                                            <td>
                                                <?php if(empty($productStock->stockImage)){?>
                                                <img width="70" height="70" src="{{asset('public/image/no_image.png')}}"></td>

                                                <?php }else{?>

                                                <img width="70" height="70" src="{{asset($productStock->stockImage)}}"></td>
                                                <?php }?>

                                            <td>
                                            <a href="{{url('admin/stock/edit/'.$productStock->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{url('admin/stock/delete/'.$productStock->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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