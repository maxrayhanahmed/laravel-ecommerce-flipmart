<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;



use App\Menu;

class MenuController extends Controller
{



    public function menuAdd(){

    $menus= Menu::all();

        return view('backEnd.menu.menu',['menus'=>$menus,]);
    } 


     public function menuStore(Request $request){

     	$this->validate($request,[
 			'menuItem'=>'required',
 			'menuImage'=>'required',
 		]);

     	$menu = new Menu();

     	if(isset($request->menuImage)){
 		$menuImage=$request->file('menuImage');  

	        $originalName = $menuImage->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/';
	        $menuImage->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

	    }

     	$menu->menuItem = $request->menuItem;
     	$menu->menuImage = $imageUrl;
     	$menu->menuDetails = $request->menuDetails;

     	$menu->save();
        return back()->with('message_form','Menu Item save successfully');



    } 

    
}
