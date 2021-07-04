<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
     public function blogPage(){

    	
	$blogs = Blog::where('publication_status','1')->paginate(3);

    	return view('frontEnd.blog.blogPage',compact('blogs'));
    }

     public function blogDetails($id){

    	
	$blog = Blog::where('id',$id)->where('publication_status',1)->first();

    	return view('frontEnd.blog.blog-details',compact('blog'));
    }

    
}
