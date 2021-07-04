


@extends('backEnd.master')


@section('mainContent')



      
      <div id="page-wrapper">
      	  
    <div class="row">
 

               <div class="col-md-12">
                    <div class="panel panel-default">

                    <div class="panel-heading">
                        <h3 class="">     
                                              All products

                        </h3>
                        </div>
                    

                            

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                               
                                    @foreach($blogs as $post)

                                        <tr>
                                           <td> {{$loop->index}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{ substr(strip_tags($post->description), 0, 100) }}</td>
                                            <td>
                                                <img width="60px" src="{{asset($post->post_image)}}">
                                            </td>
                                             <td>
                                            <?php if($post->publication_status==1){ ?>
                                                <a href="{{route('status.update',$post->id)}}"  class="btn btn-success"  data-toggle="tooltip" title="Unpublish">
                                                    Publish
                                                </a>
                                            <?php }else{ ?>
                                                <a href="{{route('status.update',$post->id)}}"  class="btn btn-info"  data-toggle="tooltip" title="Publish">
                                                    Unpublish
                                                </a>
                                            <?php } ?>

                                                </td>
                                            <td>
                                                 <a href="{{route('blogPost.edit',$post->id)}}"  class="btn btn-default btn-xs"  data-toggle="tooltip" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="{{route('blogPost.delete',$post->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
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