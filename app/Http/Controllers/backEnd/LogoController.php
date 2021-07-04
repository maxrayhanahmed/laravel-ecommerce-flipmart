<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logo;

class LogoController extends Controller
{
    public function logoViews(){
    	$logo_image = Logo::find(1);
   		return view('backEnd.logo.logoPage',compact('logo_image'));

    }
   


public function logoUpdate(Request $request){

 		$this->validate($request,[
 			
 			'logo_image'=>'required',
 		]);
    	  $logoheader = Logo::find($request->logo_id);


 		if(isset($request->logo_image)){
 		 $logo_image=$request->file('logo_image');  

 		 $old_path = $logoheader->logo_image;
	    		if(!empty($old_path)){
	    			unlink($old_path);
	    		}
 
	        $originalName = $logo_image->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/logo/';
	        $logo_image->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

	    }

    	    $logoheader->logo_image = $imageUrl;
    	    $logoheader->save();


    	return redirect('admin/logo')->with('success','Logo update successfully');
    }
}
