<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
     public function postViews(){
   		return view('backEnd.blog.blogPage');

    }
   
   public function postStore(Request $request){

 		$this->validate($request,[
 			'title'=>'required|max:150',
            'description'=>'required|max:3000',
            'publication_status'=>'required',
 		]);

    	  $blog = new Blog();


 		if(isset($request->post_image)){
 		 $post_image=$request->file('post_image');  


	        $originalName = $post_image->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/blog/';
	        $post_image->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

	    }

    	    $blog->admin_id = $request->admin_id;
    	    $blog->title = $request->title;
    	    $blog->description = $request->description;
    	    $blog->post_image = $imageUrl;
    	    $blog->publication_status = $request->publication_status;
    	    $blog->save();


    	return back()->with('success','Blog post insert successfully');
    }


 public function postManage(){
    	$blogs = Blog::all();
   		return view('backEnd.blog.blogManage',compact('blogs'));

    }

     public function statusUpdate($id){

    	 $blog = Blog::find($id);

    	 if($blog->publication_status==0){
    	 	$publicStatus = 1;
            $status = 'publish';
    	 }else{
            $publicStatus = 0;
            $status = 'Unpublish';

    	 }
     	$blog->publication_status = $publicStatus;
     	$blog->save();

    	
       return back()->with('success', 'This post '.$status.' successfully ');
    }


    public function postEdit($id){

        $blog = Blog::find($id);

        return view('backEnd.blog.postEdit',compact('blog'));
    }

    public function postDelete($id){

        $blog = Blog::find($id);

        $old_path = $blog->post_image;
	    		if(!empty($old_path)){
	    			unlink($old_path);
	    		}

	    $blog->delete();
	    return redirect('admin/blog/manage')->with('success','Post delete successfully');
    }

    
    public function postUpdate(Request $request){

     	  $this->validate($request,[
            'title'=>'required|max:150',
            'description'=>'required|max:3000',
            'publication_status'=>'required',
            
        ]);
     	    $blog = Blog::find($request->edited_id);

     	  if(isset($request->post_image)){
 		 $post_image=$request->file('post_image');  

 		 $old_path = $blog->post_image;
	    		if(!empty($old_path)){
	    			unlink($old_path);
	    		}
 
	        $originalName = $post_image->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/blog/';
	        $post_image->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

       	 $blog->post_image = $imageUrl;

	    }

        $blog->admin_id = $request->admin_id;
        $blog->title = $request->title;
        $blog->description = $request->description;

        $blog->publication_status = $request->publication_status;
       
        $blog->save();

     
        return back()->with('success','Post update successfully');


    } 


    

}
