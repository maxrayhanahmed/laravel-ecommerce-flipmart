


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                    	
	                   		Add Product 
                    </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">
    

       {!! Form::open(['route'=>'admin.product.store','method'=>'POST','enctype'=>'multipart/form-data'])!!}
           <div class="col-md-9">

            <div class="form-group">
                <label for="title">Title: <span class="text-danger">*</span></label>
                <input class="form-control" name="title" id="title">
                <span class="text-danger">{{$errors->first('title')}}</span>

            </div>
            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

        
            <div class="form-group">
                <label for="description">Details : <span class="text-danger">*</span></label>
                <textarea style="height:100px" id="tinymceEditor" class="form-control" name="description" id="description"></textarea>
                <span class="text-danger">{{$errors->first('description')}}</span>

            </div>

            <div class="form-group">
                <label for="type">Type : </label>
                <select class="form-control" id="type" name="type">
                    <option value="1">New</option>
                    <option value="2">Hot</option>
                    <option value="3">Sale</option>
                </select>
            </div>

            <div class="form-group">
                <label for="brand_id">Brand : <span class="text-danger">*</span></label>
                <select class="form-control" id="brand_id" name="brand_id">
                    <option value="1">select</option>
                    @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}} {{$brand->code}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{{$errors->first('brand_id')}}</span>
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
                <label for="category_id">Category : </label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">select</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->subcatName}}</option>
                    @endforeach
                </select>

            </div>
        
            <div class="form-group">
                <label for="tag">Tags : </label>
                <textarea class="form-control" name="tag" id="tag"></textarea>

            </div>
            <div class="form-group">
                <label for="price">Price :</label>
                <input type="number" name="price" class="form-control" id="price">
               
            </div>
            <div class="form-group">
                <label for="quantity">Quantity : <span class="text-danger">*</span></label>
                <input type="number" name="quantity" class="form-control" id="quantity">
                <span class="text-danger">{{$errors->first('quantity')}}</span>

            </div>



                <div class="form-group">
                    <label for="product_image">Image 1 : ( This image use for Thumbnail )</label>
                    <input type="file" id="product_image" name="product_image[]" class="form-control">  
                   
                </div>

                <div class="form-group">
                    <label for="product_image">Image 2 : </label>
                    <input type="file" id="product_image" name="product_image[]" class="form-control">  
                   
                </div>
                <div class="form-group">
                    <label for="product_image">Image 3 : </label>
                    <input type="file" id="product_image" name="product_image[]" class="form-control">  
                   
                </div>
                <div class="form-group">
                    <label for="product_image">Image 4 : </label>
                    <input type="file" id="product_image" name="product_image[]" class="form-control">  
                   
                </div>
                <div class="form-group">
                    <label for="product_image">Image 5 : </label>
                    <input type="file" id="product_image" name="product_image[]" class="form-control">  
                   
                </div>




       
            
            </div>

            <div class="col-md-12">
            <button class="btn btn-info" type="submit">Save</button>
            </div>
			{!!Form::close()!!}


    </div>
</div>
@endsection

@section('script')


<script src="{{asset('public/backEnd/tinyeditor/tinymce.min.js')}}"></script>

<script>tinymce.init({selector:'#tinymceEditor'});</script>


@endsection