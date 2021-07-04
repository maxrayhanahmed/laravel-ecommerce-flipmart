


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Customer Orders</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">



               <div class="col-md-12">
                    <div class="panel panel-default">

                    <div class="panel-heading">;
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
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Shipping Address</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    @foreach($orders as $order)

                                        <tr>
                                           <td>{{ $loop->iteration }}</td>
                                            <td>{{$order->name}}</td>
                                            <td>{{$order->phone}}</td>
                                            <td>{{$order->email}}</td>
                                            <td>{{$order->shipping_address}}</td>
                                            <td>
                                                <p>
                                                    @if($order->is_seen_by_admin==null)
                                                    <a href="" class="btn btn-danger btn-xs">Admin Not See</a>
                                                    @else
                                                    <a href="" class="btn btn-success btn-xs">Admin See</a>
                                                    @endif
                                                </p>


                                            	<p>
                                            		@if($order->is_paid==null)
                                            		<a href="" class="btn btn-danger btn-xs">paid</a>
                                            		@else
                                            		<a href="" class="btn btn-success btn-xs">paid</a>
                                            		@endif
                                            	</p>
                                            	<p>
                                            		@if($order->is_completed==null)
                                            		<a href="" class="btn btn-danger btn-xs">Uncomplete</a>
                                            		@else
                                            		<a href="" class="btn btn-success btn-xs">Complete</a>
                                            		@endif
                                            	</p>
                                            	
                                            </td>
                                            <td>
                                            
                                                <a href="{{url('admin/order/delete/'.$order->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    <i class="fa fa-remove"></i>
                                                </a>

                                                <a href="{{url('admin/order/detail/'.$order->id)}}" class="btn btn-info btn-xs">View</a>
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