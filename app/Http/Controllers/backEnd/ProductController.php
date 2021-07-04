<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Subcategory;
use App\ProductImage;
use App\Brand;
use DB;
use Image;


class ProductController extends Controller
{
    public function productAdd(){
        $subcategories = Subcategory::all();
    	$brands = Brand::all();

        return view('backEnd.product.productAdd',compact('subcategories','brands'));
    }

    
    

     public function productStore(Request $request){

     	$this->validate($request,[
 			'title'=>'required|max:150',
 			'description'=>'required|max:3000',
            'publication_status'=>'required',
            'brand_id'=>'required',
            'quantity'=>'required',
 		]);

     	$product = new Product();

     	
     	$product->title = $request->title;
     	$product->category_id = $request->category_id;
     	$product->tag = $request->tag;
     	$product->price = $request->price;
     	$product->description = $request->description;
     	$product->type = $request->type;
        $product->quantity = $request->quantity;
        $product->user_id = $request->user_id;
        $product->brand_id = $request->brand_id;

     	$product->publication_status = $request->publication_status;
       
     	$product->save();

        /////////

        //$input = Input::file('images');


            if (isset($request->product_image)) {
                $index = 1;
                foreach ($request->product_image as $image) {
                    //$image=$request->file('product_image');  
 
                    $f_ext = $image->getClientOriginalExtension();

                   // $div            =explode('.',$originalName);
                   // $f_ext          =strtolower(end($div));
                    $imageName = time().$index++.'.'.$f_ext;

                    $imagePath = 'public/backEnd/images/products/';
                    $location = $image->move($imagePath,$imageName);
                    $imageUrl  = $imagePath.$imageName;

                   // Image::make($image)->save($imageUrl);

                    $product_image = new ProductImage();

                    $product_image->product_id = $product->id;
                    $product_image->product_Image = $imageUrl;
                    $product_image->save();

                }
            }


        

        /////////////
        return back()->with('message_form','Product Item save successfully');


    } 

	public function productManage(){

    	$products = Product::all();

        return view('backEnd.product.productManage',['products'=>$products]);
    }

    public function productStatusUpdate($id){

    	 $catByProduct = Product::find($id);

    	 if($catByProduct->publication_status==0){
    	 	$publicStatus = 1;
    	 }else{
    	 	$publicStatus = 0;
    	 }
     	$catByProduct->publication_status = $publicStatus;
     	$catByProduct->save();


    	
       return back();
    }

    
	public function productEdit($id){

    	$subcategories = Subcategory::all();

        $catByProduct = Product::find($id);
    	$product_images = ProductImage::where('product_id',$id)->get();
        $brands = Brand::all();


        return view('backEnd.product.productEdit',compact('subcategories','catByProduct','product_images','brands',));
    }


    
     public function productUpdate(Request $request){

     	  $this->validate($request,[
            'title'=>'required|max:150',
            'description'=>'required|max:3000',
            'publication_status'=>'required',
            'brand_id'=>'required',
            'quantity'=>'required',
        ]);

     	$productById = Product::find($request->editedId);

        $productById->title = $request->title;
        $productById->category_id = $request->category_id;
        $productById->tag = $request->tag;
        $productById->price = $request->price;
        $productById->description = $request->description;
        $productById->type = $request->type;
        $productById->quantity = $request->quantity;
        $productById->user_id = $request->user_id;
        $productById->brand_id = $request->brand_id;

        $productById->publication_status = $request->publication_status;
       
        $productById->save();

         if (isset($request->product_image)) {
                $index = 1;
                foreach ($request->product_image as $image) {
                    //$image=$request->file('product_image');  
 
                    $f_ext = $image->getClientOriginalExtension();

                   // $div            =explode('.',$originalName);
                   // $f_ext          =strtolower(end($div));
                    $imageName = time().$index++.'.'.$f_ext;

                    $imagePath = 'public/backEnd/images/products/';
                    $location = $image->move($imagePath,$imageName);
                    $imageUrl  = $imagePath.$imageName;

                   // Image::make($image)->save($imageUrl);

                    $product_image = new ProductImage();


                    $product_image->product_id = $request->editedId;
                    $product_image->product_Image = $imageUrl;
                    $product_image->save();

                }
            }




     
        return back()->with('success','Product Item save successfully');


    } 

    public function productDelete($id){
        $product = Product::find($id);
        
 
        $product->delete();
        $product_images = ProductImage::where('product_id',$id)->get();

             foreach ($product_images as $product_image) {
                 unlink($product_image->product_image);

                 $product_image->delete();
             }
        
        return back()->with('message_list','Product Item delete successfully');

    }
    

 public function productImageDelete($id){

        $image = ProductImage::find($id);

        $path = $image->product_image;

                 unlink($path);

        
        $image->delete();


        return back()->with('success','Product Image delete successfully');

    }
    




    

    
}
 
