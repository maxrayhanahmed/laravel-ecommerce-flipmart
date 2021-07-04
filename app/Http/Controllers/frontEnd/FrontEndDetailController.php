<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\CustomerProductTag;
use App\CustomerReview;
use App\Product;

class FrontEndDetailController extends Controller
{
    public function productDetail($id){

    	$product = Product::where('id',$id)->where('publication_status',1)->first();
        $related= Product::where('category_id', '=', $product->category->id)
            ->where('id', '!=', $product->id)
            ->where('publication_status',1)
            ->get();

        Product::where('id', $product->id)->increment('views'); 

    	return view('frontEnd.singles.single-product',compact('product','related'));
    } 


    public function customerTagStore(Request $request){

     	$productTag = new CustomerProductTag();

     	$this->validate($request,[
 			'customerProductTag'=>'required',
 		]);

     	$productTag->productId = $request->productId;
        $productTag->customerProductTag = $request->customerProductTag;
     	$productTag->save();

       return back();

    }
	public function customerReviewStore(Request $request){

     	$customerReview = new CustomerReview();

     	$this->validate($request,[
 			'customerName'=>'required',
 			'summary'=>'required',
 			'textReview'=>'required',
 		]);

     	$customerReview->productId = $request->productId;
        $customerReview->customerName = $request->customerName;
        $customerReview->summary = $request->summary;
        $customerReview->starReview = $request->starReview;
        $customerReview->textReview = $request->textReview;
     	$customerReview->save();

     		//return $request->all();

     	
       return back();


    }
    
}
