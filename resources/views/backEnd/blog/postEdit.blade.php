


@extends('backEnd.master')


@section('mainContent')

		

      <div id="page-wrapper">

			<div class="row">
				<div class="col-md-9">
					
			    	<h2 class="page-header">
			    	     Update Post 
                    </h2>
		    	</div>
	    	</div>


                    
                <!-- /.col-lg-12 -->

    <div class="row">
    

       {!! Form::open(['route'=>'post.update','name'=>'blog_form','method'=>'POST','enctype'=>'multipart/form-data'])!!}
           <div class="col-md-9">

            <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span></label>
                <input class="form-control" name="title" id="title" value="{{$blog->title}}">
                <span class="text-danger">{{$errors->first('title')}}</span>

            </div>
            <input type="hidden" value="{{ Auth::user()->id }}" name="admin_id">
            <input type="hidden" value="{{$blog->id}}" name="edited_id">

        
            <div class="form-group">
                <label for="description">Details : <span class="text-danger">*</span></label>
                <textarea style="height:100px" id="tinymceEditor" class="form-control" name="description" id="description">
                	{{$blog->description}}
                </textarea>
                <span class="text-danger">{{$errors->first('description')}}</span>

            </div>
             <div class="form-group">
                    <label for="post_image">Image: </label>
                    <input type="file" id="post_image" name="post_image" class="form-control">  
                   
                </div>
                <img width="80px" src="{{asset($blog->post_image)}}">

              
          
             <div class="form-group">
                <label for="publication_status">Publication Status : </label>
                <select class="form-control" id="publication_status" name="publication_status">
                    <option value="0">Unpublish</option>
                    <option value="1">Publish</option>
                </select>
                <span class="text-danger">{{$errors->first('publication_status')}}</span>

            </div>



            </div>
            
            <div class="col-md-3">

            </div>

            <div class="col-md-12">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
            {!!Form::close()!!}


    </div>
</div>
@endsection

@section('script')
<script>
	    document.forms['blog_form'].elements['publication_status'].value="{{ $blog->publication_status}}";

</script>


<script src="{{asset('public/backEnd/tinyeditor/tinymce.min.js')}}"></script>

<script>tinymce.init({selector:'#tinymceEditor'});</script>


@endsection