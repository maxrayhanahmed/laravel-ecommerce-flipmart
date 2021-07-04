<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    public function categoryPage($id=NULL){

    	$categories = Category::all();
    	$categoryEdit = Category::find($id);

        return view('backEnd.category.category',['categories'=>$categories,'categoryEdit'=>$categoryEdit]);
    }


     public function categoryStore(Request $request){

     	$category = new Category();

     	$this->validate($request,[
 			'categoryName'=>'required',
 		]);

     	$category->categoryDetails = $request->categoryDetails;
        $category->categoryName = $request->categoryName;

     	$category->save();

        return back()->with('message_form','Category save successfull');
    }

	public function categoryUpdate(Request $request){

		$this->validate($request,[
 			'categoryName'=>'required',
 		]);


    	$categoryById = Category::find($request->editId);

     	
     	$categoryById->categoryName = $request->categoryName;
     	$categoryById->categoryDetails = $request->categoryDetails;

     	$categoryById->save();

        return redirect('admin/category')->with('message_list','Category update successfull');
    }
    

 public function categoryDelete($id=NULL){

        $catById = Category::find($id);

        $catById->delete();

        return redirect('admin/category')->with('message_list','Category delete successfull');
    }
    

}
