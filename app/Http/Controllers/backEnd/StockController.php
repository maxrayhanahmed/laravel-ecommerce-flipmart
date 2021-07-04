<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Subcategory;
use App\ProductStock;
use DB;


class StockController extends Controller
{
    public function productStock($id=NULL){
    	$subcategories = Subcategory::all();
    	$productStocks = DB::table('product_stocks')
			->join('subcategories', 'subcategories.id', '=', 'product_stocks.subcatId')
			->select('product_stocks.*','subcategories.subcatName','subcategories.subcatCode',)
			->get();
		$stockById = ProductStock::find($id);

    	return view('backEnd.stocks.productStock',['subcategories'=>$subcategories,'productStocks'=>$productStocks,'stockById'=>$stockById]);
    }

 	public function productStockStore(Request $request){

     	$this->validate($request,[
 			'subcatId'=>'required',
 			'stockQue'=>'required',
 		]);

     	$productStock = new ProductStock();

     	if(isset($request->stockImage)){
 		$stockImage=$request->file('stockImage');  

	        $originalName = $stockImage->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/stocks/';
	        $stockImage->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

	    }else{$imageUrl='';}

     	$productStock->subcatId = $request->subcatId;
     	$productStock->stockQue = $request->stockQue;
     	$productStock->stockImage = $imageUrl;

     	$productStock->save();
        return back()->with('message_form','Product stock Item save successfully');



    } 

    public function productStockUpdate(Request $request){

     	$this->validate($request,[
 			'subcatId'=>'required',
 			'stockQue'=>'required',
 		]);

     	$stockById = ProductStock::find($request->editedId);


     	 $stockImage=$request->file('stockImage');    
 		 //dd($clientImage);
    	if($stockImage){
    		$old_path = $stockById->stockImage;
	    		if(!empty($old_path)){
	    			unlink($old_path);
	    		}

	        $originalName = $stockImage->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext; 
	        $imagePath = 'public/backEnd/images/stocks/';
	        $stockImage->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

    	}else{
    		$stockById = ProductStock::find($request->editedId);
    		$imageUrl = $stockById->stockImage;
    	}


     	$stockById->subcatId = $request->subcatId;
     	$stockById->stockQue = $request->stockQue;
     	$stockById->stockImage = $imageUrl;

     	$stockById->save();
        return redirect('/admin/stock')->with('message_list','Product stock Item update successfully');



    } 

     public function productStockDelete($id=NULL){
    	
		$stockById = ProductStock::find($id);
		$Image = $stockById->stockImage;
			 if(!empty($Image)){
				unlink($Image);
			 }
		$stockById->delete();

    	return redirect('/admin/stock')->with('message_list','Stock Item delete successfully');
    }


    

    
   
}
