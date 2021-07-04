


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Client</h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">

       {!! Form::open(['url'=>'/admin/menu-store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
        <div class="col-md-4">
            <div class="form-group">
                <label for="menuItem">Menu Item : <span class="text-danger">*</span></label>
                <input class="form-control" name="menuItem" id="menuItem">
                <span class="text-danger">{{$errors->first('menuItem')}}</span>

            </div>
        

            <div class="form-group">
                <label for="menuImage">Menu Image : <span class="text-danger">*</span></label>
                <input class="form-control" type="file" name="menuImage" id="menuImage">
                <span class="text-danger">{{$errors->first('menuImage')}}</span>

            </div>

            <div class="form-group">
                <label for="menuDetails">Menu Details : <span class="text-danger">*</span></label>
                <textarea class="form-control" name="menuDetails" id="menuDetails"> </textarea>
                <span class="text-danger">{{$errors->first('menuDetails')}}</span>

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
                                            <th>Menu Item</th>
                                            <th>Details</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $i=1;
                                     ?>
                                    @foreach($menus as $menu)

                                        <tr>
                                           <td> {{ $i++}}</td>
                                            <td>{{$menu->menuItem}}</td>
                                            <td>
                                             {{ substr(strip_tags($menu->menuDetails), 0, 60) }}

                                            </td>
                                            <td><img width="50" height="50" src="{{asset($menu->menuImage)}}"></td>
                                            <td>
                                            <a href="{{url('admin/package/')}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{url('admin/package/delete/')}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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