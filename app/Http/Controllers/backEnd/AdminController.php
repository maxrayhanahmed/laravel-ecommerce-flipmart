<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Admin;

class AdminController extends Controller
{
	

   
	
    public function adminStore(Request $request){

   	$this->validate($request,[
 			'email'=>'required',
 			'name'=>'required',
 			'phone'=>'required',
 			'address'=>'required',
 			'password'=>'required',
 			'con_password'=>'required',
 		]);

   		$admin = new Admin();

   		
			$admin->email = $request->email;
	   		$admin->name = $request->name;
	   		$admin->phone = $request->phone;
	   		$admin->address = $request->address;
   			$admin->password = $request->password;
   			$admin->save();
   			return 'insert seccess';
   			//return redirect()->with('success','Registation successfully');

   }
  public function mange(){
    $admins = Admin::all();

        return view('backEnd.admin.adminManage',compact('admins'));
   }


}
