<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/deshboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');

    }


    public function showLoginForm()
    {
        return view('backEnd.admin.login');

     }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);


        $credential = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

         if(Auth::guard('admin')->attempt($credential, $request->member)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email,remember'));

        
    }

    
   
 
 
    
}
