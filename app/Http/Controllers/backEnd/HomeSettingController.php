<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomePageSetting;

class HomeSettingController extends Controller
{
    public function setingPageView($id=NULL){

    	$homeSettings = HomePageSetting::find(1);

        return view('backEnd.settings.homeSettings',compact('homeSettings'));
    }
     public function sliderSettingUpdate(Request $request){


    	$setting = HomePageSetting::find($request->id);
     	$setting->slider_limit = $request->slider_limit;

     	$setting->save();


        return back()->with('success','Slide options update successfully !!');
    }


    public function sliderSwitch(){

    	$sliderSwitch = HomePageSetting::find(1);
    	if($sliderSwitch->is_slider==0){
    		$sliderSwitch->is_slider = 1;
    		$status = "on";

    	}else{
    		$sliderSwitch->is_slider = 0;
    		$status = "off";
    	}

     		$sliderSwitch->save();


        return back()->with('success','Home Slider '.$status.' successfully !!!');
    }

   public function newProductSwitch(){

    	$newProduct = HomePageSetting::find(1);
    	if($newProduct->is_new_product==0){
    		$newProduct->is_new_product = 1;
    		$status = "on";

    	}else{
    		$newProduct->is_new_product = 0;
    		$status = "off";
    	}

     		$newProduct->save();


        return back()->with('success','New Product '.$status.' successfully !!!');
    }


    //admin.slider.switch.setting
    public function newProductSettingUpdate(Request $request){


    	$setting = HomePageSetting::find($request->id);
     	$setting->new_product_limit = $request->new_product_limit;

     	$setting->save();


        return back()->with('success','Slide options update successfully !!');
    }

    public function featuredProductSwitch(){

    	$setting = HomePageSetting::find(1);
    	if($setting->is_featured_product==0){
    		$setting->is_featured_product = 1;
    		$status = "on";

    	}else{
    		$setting->is_featured_product = 0;
    		$status = "off";
    	}

     		$setting->save();


        return back()->with('success','Feature Product '.$status.' successfully !!!');
    }

    public function featureProductSettingUpdate(Request $request){


    	$setting = HomePageSetting::find($request->id);
     	$setting->featured_product_limit = $request->featured_product_limit;

     	$setting->save();


        return back()->with('success','Slide options update successfully !!');
    }

    public function bestSeller_productProductSwitch(){

    	$setting = HomePageSetting::find(1);
    	if($setting->is_bestSeller_product==0){
    		$setting->is_bestSeller_product = 1;
    		$status = "on";

    	}else{
    		$setting->is_bestSeller_product = 0;
    		$status = "off";
    	}

     		$setting->save();


        return back()->with('success','Best selles Product '.$status.' successfully !!!');
    }

    public function bestSellerProductSettingUpdate(Request $request){


    	$setting = HomePageSetting::find($request->id);
     	$setting->bestSeller_product_limit = $request->bestSeller_product_limit;

     	$setting->save();


        return back()->with('success','Best seller options update successfully !!');
    }

    public function blogPostSwitch(){

    	$setting = HomePageSetting::find(1);
    	if($setting->is_blog_post==0){
    		$setting->is_blog_post = 1;
    		$status = "on";

    	}else{
    		$setting->is_blog_post = 0;
    		$status = "off";
    	}

     		$setting->save();


        return back()->with('success','Blog post '.$status.' successfully !!!');
    }

     public function blog_postSettingUpdate(Request $request){


    	$setting = HomePageSetting::find($request->id);
     	$setting->blog_post_limit = $request->blog_post_limit;

     	$setting->save();


        return back()->with('success','Best seller options update successfully !!');
    }

 public function arrivalsSwitch(){

    	$setting = HomePageSetting::find(1);
    	if($setting->is_newArrivals_product==0){
    		$setting->is_newArrivals_product = 1;
    		$status = "on";

    	}else{
    		$setting->is_newArrivals_product = 0;
    		$status = "off";
    	}

     		$setting->save();


        return back()->with('success','Arrivals product '.$status.' successfully !!!');
    }

     public function arrivalsSettingUpdate(Request $request){


    	$setting = HomePageSetting::find($request->id);
     	$setting->newArrivals_product_limit = $request->newArrivals_product_limit;

     	$setting->save();


        return back()->with('success','Arrivals products options update successfully !!');
    }




}
