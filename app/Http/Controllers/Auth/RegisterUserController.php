<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;

use App\User;


class RegisterUserController extends Controller
{


	use RegistersUsers;

	public function __construct()
    {
        $this->middleware('guest');
    }

     public function showRegistrationForm(){


       return view('frontEnd.users.register');

   }


   

        protected $redirectTo = '/';


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:20'],
            'lastName' => ['string', 'max:20'],
            'phone' => ['required','string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }


/*
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
   			//return redirect()->with('message','Registation successfully');

   } */

}
