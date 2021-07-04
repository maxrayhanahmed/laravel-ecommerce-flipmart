<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Customer;
use App\Order;
use App\ShoppingCart;
use Auth;

class CustomerController extends Controller
{
    public function customerAdd(){

   	return view('frontEnd.customers.customerRegister');

   }
   public function customerStore(Request $request){

   	$this->validate($request,[
 			'cus_email'=>'required',
 			'cus_name'=>'required',
 			'cus_phone'=>'required',
 			'cus_address'=>'required',
 			'cus_pass'=>'required',
 			'cus_con_pass'=>'required',
 		]);

   		$customer = new Customer();

   	//return $request->all();

   		
   		if($request->cus_pass===$request->cus_con_pass){
			$customer->cus_email = $request->cus_email;
	   		$customer->cus_name = $request->cus_name;
	   		$customer->cus_phone = $request->cus_phone;
	   		$customer->cus_address = $request->cus_address;
   			$customer->cus_pass = $request->cus_pass;
   			$customer->save();
   			return back()->with('message','Registation successfully');

   		}else{

   			return back()->with('con_bad_mess','confirm password no match to password');

   		}



   }

   public function addCheckout(){
      return view('frontEnd.customers.checkout');

   }

 


}
