


@extends('backEnd.master')

@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	
	                   		Update Product 
                    </h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">
    

       {!! Form::open(['route'=>'admin.product.update','method'=>'POST', 'enctype'=>'multipart/form-data','name'=>'productForm'])!!}
           <div class="col-md-9">

            <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span></label>
                <input class="form-control" name="title" id="title" value="{{$catByProduct->title}}">
                <span class="text-danger">{{$errors->first('title')}}</span>

            </div>
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
            <input type="hidden" value="{{ $catByProduct->id }}" name="editedId">

        
            <div class="form-group">
                <label for="description">Details : <span class="text-danger">*</span></label>
                <textarea style="height:100px" id="textarea222" class="" name="description" id="description">
                	{{$catByProduct->description}}
                </textarea>
                <span class="text-danger">{{$errors->first('description')}}</span>

            </div>

            <div class="form-group">
                <label for="type">Type : <span class="text-danger">*</span></label>
                <select class="form-control" id="type" name="type">
                    <option value="1">New</option>
                    <option value="2">Hot</option>
                    <option value="3">Sale</option>
                </select>
 
            </div>

            <div class="form-group">
                <label for="brand_id">Brand : <span class="text-danger">*</span></label>
                <select class="form-control" id="brand_id" name="brand_id">
                    <option value="">New</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}} {{$brand->code}}</option>
                    @endforeach
                </select>
 
            </div>


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

            <div class="form-group">
                <label for="category_id">Category : <span class="text-danger">*</span></label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">select</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->subcatName}}</option>
                    @endforeach
                </select>

            </div>
        
            <div class="form-group">
                <label for="tag">Tags : </label>
                <textarea class="form-control" name="tag" id="productTag">
                	{{$catByProduct->tag}}
                </textarea>

            </div>
            <div class="form-group">
                <label for="price">Price : <span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control" id="price" value="{{$catByProduct->price}}">

            </div>
            <div class="form-group">
                <label for="quantity">Quantity : <span class="text-danger">*</span></label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{$catByProduct->quantity}}">
                <span class="text-danger">{{$errors->first('quantity')}}</span>

            </div>

            <div class="form-group">
                <label for="productImage">Image 1 : </label>
                <input type="file" id="productImage" name="product_image[]" class="form-control">  
            </div>
            <div class="form-group">
                <label for="productImage">Image 2 : </label>
                <input type="file" id="productImage" name="product_image[]" class="form-control">  
            </div>
            <div class="form-group">
                <label for="productImage">Image 3 : </label>
                <input type="file" id="productImage" name="product_image[]" class="form-control">  
            </div>
            <div class="form-group">
                <label for="productImage">Image 4 : </label>
                <input type="file" id="productImage" name="product_image[]" class="form-control">  
            </div>

            <div class="form-group">
                <label for="productImage">Image 5 : </label>
                <input type="file" id="productImage" name="product_image[]" class="form-control">  
            </div>

            <p><b>First image use for Thumbnail</b></p>
            @foreach($catByProduct->image as $image)

            <img width="60" src="{{asset($image->product_image)}}">
            <a href="{{route('admin.image.product.delete',$image->id)}}"class="btn btn-danger btn-xs"  data-toggle="tooltip" title="Delete">
                                                    <i class="fa fa-remove"></i>
                                                </a>
            @endforeach
            <br>

            <div class="col-md-12">
            <button class="btn btn-info" type="submit">Update</button>
            </div>
			{!!Form::close()!!}


    </div>
</div>


@endsection

@section('script')

<script>
    document.forms['productForm'].elements['type'].value="{{ $catByProduct->type}}";
    document.forms['productForm'].elements['brand_id'].value="{{ $catByProduct->brand_id}}";

    document.forms['productForm'].elements['category_id'].value="{{ $catByProduct->category_id}}";

    document.forms['productForm'].elements['publication_status'].value="{{ $catByProduct->publication_status}}";


</script>

<script src="{{asset('public/backEnd/tinyeditor/tinymce.min.js')}}"></script>

<script>tinymce.init({selector:'#textarea222'});</script>


@endsection