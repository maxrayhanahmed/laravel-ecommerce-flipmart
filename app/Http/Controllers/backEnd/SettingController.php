<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Information;

class SettingController extends Controller
{
     public function infomationsView(){
    	
		$informations = Information::all();

		return  view('backEnd.settings.informations',compact('informations'));

    }

     public function infomationsUpdate(Request $request)
    {
    	//return $request->all();

    	$this->validate($request,[
 			'name'=>'required',
 			'phone'=>'required',
 			'email'=>'required',
 			'address'=>'required',
 		]);
 		    $information = Information::find($request->id);
			$information->name = $request->name;
			$information->phone = $request->phone;
			$information->email = $request->email;
			$information->address = $request->address;
			$information->location_code = $request->location_code;
			$information->save();
			
        return back()->with('success','Site Title update successfully');

    }



}
