<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
   public function manageUsers(){
   		$users = User::all();
   		return view('backEnd.users.users',compact('users'));

    }

    public function deleteUser($id){
   		$user = User::find($id);
   		$user->delete();
   		return redirect('admin/users')->with('message_list','User delete successfull');

    }

    public function userAccount(){
   		//$users = User::all();
   		return view('frontEnd.users.account');

    }
	public function userAccountEdit(){
   		//$users = User::all();
   		return view('frontEnd.users.accountEdit');

    }

	public function userAccountUpdate(Request $request){

   		$user = User::find($request->id);
   		$user->firstName = $request->firstName;
   		$user->lastName = $request->lastName;
   		$user->phone = $request->phone;
   		$user->email = $request->email;
   		$user->address = $request->address;
   		$user->save();
   		return view('frontEnd.users.account');

    }




    

    /*if(Auth::user())
 	{{Auth::user()->firstName}}
	endif  */

}
