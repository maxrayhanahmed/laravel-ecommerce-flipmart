<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Product;
use App\HomeSlider;
use DB;

class HomeSliderController extends Controller
{
     public function sliderAdd(){

    
    $products = Product::where('publication_status',1)->get();
    $homeSliders = HomeSlider::where('publishStatus',1)->orderBy('slideRating','DESC')->get();

        return view('backEnd.sliders.homeSlider',compact('homeSliders','products'));
    } 

    public function sliderStore(Request $request){

     	$this->validate($request,[
 			'productId'=>'required',
 			'slideRating'=>'required',
 		]);

     	$homeSlider = new HomeSlider();

     	 
     	$homeSlider->productId = $request->productId;
     	$homeSlider->slideRating = $request->slideRating;
     	$homeSlider->publishStatus = $request->publishStatus;

     	$homeSlider->save();
        return back()->with('success','Slider item save successfully');



    } 

     public function sliderStatus($id){

    	 $catByHomeslide = HomeSlider::find($id);

    	 if($catByHomeslide->publishStatus==0){
    	 	$publicStatus = 1;
    	 }else{
    	 	$publicStatus = 0;
    	 }
     	$catByHomeslide->publishStatus = $publicStatus;
     	$catByHomeslide->save();

    	
       return back();
    }

  public function homeSliderDelete($id=NULL){
    	
		$catByHomeslide = HomeSlider::find($id);
		
		$catByHomeslide->delete();

    	return back()->with('message_list','Slider Item delete successfully');
    }


    


}
 