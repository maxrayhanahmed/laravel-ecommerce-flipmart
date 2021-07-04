


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Client</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">

       {!! Form::open(['url'=>'/admin/home-slider/store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="col-md-4">
            <div class="form-group">
                <label for="productId">Slide Product : <span class="text-danger">*</span></label>
                <select class="form-control" name="productId" id="productId">
                	<option value="">select</option>
                	@foreach($products as $product)
                	<option value="{{$product->id}}">{{$product->title}}</option>
                	@endforeach
                </select>
                <span class="text-danger">{{$errors->first('productId')}}</span>

            </div>
        

            <div class="form-group">
                <label for="slideRating">Slide Rating : <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="slideRating" id="slideRating">
                <span class="text-danger">{{$errors->first('slideRating')}}</span>

            </div>

            <div class="form-group">
                <label for="publishStatus">Publication Status : <span class="text-danger">*</span></label>
                <select class="form-control" name="publishStatus" id="publishStatus">
                	<option value="0">Unpublish</option>
                	<option value="1">Publish</option>
                </select>

            </div>

           
            <div class="">
            <button class="btn btn-info" type="submit">Save</button>
            </div>
        </div>  
	{!!Form::close()!!}


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
                                            <th>Title</th>
                                            <th>Slide Rating</th>
                                            <th>Slide Image</th>
                                            <th>Public Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($homeSliders as $homeSlider)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$homeSlider->product->title}}</td>
                                            <td>{{$homeSlider->slideRating}}</td>
                                            <td><img width="50" height="50" src="{{asset($homeSlider->product->image[0]['product_image'])}}"></td>

                                            <td>
                                            <?php if($homeSlider->publishStatus==1){ ?>
                                            	<a href="{{url('admin/home-slider/status/'.$homeSlider->id)}}"  class="btn btn-success"  data-toggle="tooltip" title="Unpublish">
                                            		Publish
                                                </a>
                                            <?php }else{ ?>
                                            	<a href="{{url('admin/home-slider/status/'.$homeSlider->id)}}"  class="btn btn-info"  data-toggle="tooltip" title="Publish">
                                            		Unpublish
                                                </a>
                                            <?php } ?>

                                            	</td>

                                            <td>
                                                <a href="{{url('admin/home-slider/delete/'.$homeSlider->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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