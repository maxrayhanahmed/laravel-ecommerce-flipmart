<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Category;
use App\Subcategory;
use DB;

class SubcategoryController extends Controller
{
    public function subcategoryPage($id=NULL){

        $categories = Category::all();
    	$subcategories = DB::table('categories')
			->join('subcategories', 'subcategories.categoryId', '=', 'categories.id')
			->select('categories.categoryName','subcategories.*')
			->get();
    	$subcatEdit = Subcategory::find($id);

        return view('backEnd.category.subcategory',['categories'=>$categories,'subcategories'=>$subcategories,'subcatEdit'=>$subcatEdit]);
    }

     public function subcatStore(Request $request){

        $this->validate($request,[
            
            'subcatName'=>'required|unique:subcategories',
            'subcatCode'=>'unique:subcategories',
        ]);


     	$subcategory = new Subcategory();

     	
     	$subcategory->categoryId = $request->categoryId;
        $subcategory->subcatName = $request->subcatName;
     	$subcategory->subcatCode = $request->subcatCode;

     	 $subcategory->save();

        return back()->with('message_form','Category save successfull');
    }

    
    public function subcategoryUpdate(Request $request){

		
    	$categoryById = Subcategory::find($request->editId);

     	$categoryById->categoryId = $request->categoryId;
     	$categoryById->subcatName = $request->subcatName;

     	 $categoryById->save();

        return redirect('admin/subcategory')->with('message_list','subcategory update successfull');
    }

    public function subcategoryDelete($id){

		
    	 $subcatById = Subcategory::find($id);

     	$subcatById->delete();

        return redirect('admin/subcategory')->with('message_list','subcategory delete successfull');
    }

    
}
