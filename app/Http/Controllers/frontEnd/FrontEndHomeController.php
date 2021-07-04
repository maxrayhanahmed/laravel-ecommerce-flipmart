<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\Blog;
use App\HomePageSetting;
use App\HomeSlider;
use App\ShoppingCart;

use DB;

class FrontEndHomeController extends Controller
{
    
    public function showHomeContent(){

    	
			$homeSetting = HomePageSetting::find(1);

    		$homeSliders = HomeSlider::where('publishStatus',1)->orderBy('slideRating','DESC')->take($homeSetting->slider_limit)->get();


			$newProducts = Product::where('publication_status','1')->take($homeSetting->new_product_limit)->get();
			$blogs = Blog::where('publication_status','1')->take($homeSetting->blog_post_limit)->get();
			 $best_seller = Product::all();
			

    	return view('frontEnd.home.homeContent',compact('newProducts','blogs','best_seller','homeSliders','homeSetting'));
    }
}
