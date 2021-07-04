<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    public function brand($id=NULL){

    	$brands = Brand::all();
    	$brandById = Brand::find($id);

        return view('backEnd.brand.brand',['brands'=>$brands,'brandById'=>$brandById]);
    }

	public function store(Request $request){


 		$this->validate($request,[
            'name'=>'required|unique:brands|max:40',
            'code'=>'unique:brands|max:40',
            
        ]);

    	$brand = new Brand;
    	$brand->name = $request->name;
    	$brand->code = $request->code;
    	$brand->details = $request->details;
    	$brand->save();

    	return back()->with('message_form','Item save successfully');

    }


    
 public function update(Request $request){


 		$this->validate($request,[
            'name'=>'required|max:40|unique:brands,name,'.$request->edited_id,
            'code'=>'max:40|unique:brands,code,'.$request->edited_id,

            
        ]);

    	$brand = Brand::find($request->edited_id);
    	$brand->name = $request->name;
    	$brand->code = $request->code;
    	$brand->details = $request->details;
    	$brand->save();

    	return redirect('admin/brand')->with('message_list','Item update successfully');

    }

    public function delete($id){
    	$product = Brand::find($id);
    	
    	$product->delete();
        
    	return back()->with('message_list','Item delete successfully');

    }
    


    





}
