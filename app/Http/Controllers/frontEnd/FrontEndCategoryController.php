<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

use DB;

class FrontEndCategoryController extends Controller
{
    public function showContentByCategory($id){

			  $products = Product::where('category_id',$id)->where('publication_status',1)->paginate(15);
			  $productsCount = Product::where('category_id',$id)->where('publication_status',1)->count();

    	return view('frontEnd.categories.category',compact('products','productsCount'));
    }

    public function searchProduct(Request $request){

   
    	//return $request->all();
			  
			 $post_search = $request->post_search;

			 $products = Product::where('title', 'LIKE', "%$post_search%")
			    ->where('publication_status',1)
			    ->orWhere('description', 'LIKE', "%$post_search%")
			    ->orWhere('tag', 'LIKE', "%$post_search%")
			    ->paginate(15);

			  

			 $productsCount = Product::where('title', 'LIKE', "%$post_search%")
			    ->where('publication_status',1)
			    ->orWhere('description', 'LIKE', "%$post_search%")
			    ->orWhere('tag', 'LIKE', "%$post_search%")
			    ->count();


    	return view('frontEnd.categories.category',compact('products','productsCount'));
    }

    
}
