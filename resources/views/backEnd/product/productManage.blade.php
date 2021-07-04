


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	All products
                    </h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">
 

               <div class="col-md-12">
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
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Brand</th>
                                            <th>Author</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($products as $product)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$product->title}}</td>
                                            <td>
                                                @if(isset($product->category->subcatName))
                                                {{$product->category->subcatName}}
                                                @else
                                                Uncatgories
                                                @endif
                                                </td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->brand->name}}</td>
                                            <td>{{$product->user->name}}</td>

                                            <td>{{$product->quantity}}</td>
                                            <td>
                                            <?php if($product->publication_status==1){ ?>
                                            	<a href="{{url('admin/product/status/'.$product->id)}}"  class="btn btn-success"  data-toggle="tooltip" title="Unpublish">
                                            		Publish
                                                </a>
                                            <?php }else{ ?>
                                            	<a href="{{url('admin/product/status/'.$product->id)}}"  class="btn btn-info"  data-toggle="tooltip" title="Publish">
                                            		Unpublish
                                                </a>
                                            <?php } ?>

                                            	</td>
                                            <td>
                                            <a href="{{route('admin.product.edit',$product->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{route('admin.product.delete',$product->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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