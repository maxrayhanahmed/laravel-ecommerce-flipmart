<?php

namespace App\Http\Controllers\frontEnd;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Customer;
use App\Order;
use App\ShoppingCart;
use App\Payment;
use Auth;

class FrontEndCheckoutController extends Controller
{
   public function customerAdd(){

   	return view('frontEnd.customers.customerRegister');

   }
   

   public function addCheckout(){
    $carts = ShoppingCart::where('order_id',null)->get();
    $paymentMethods = Payment::all();

    if(!$carts->count()<=0){
        return view('frontEnd.customers.checkout',compact('carts','paymentMethods'));

    }else{
      return redirect('cart');
    }

      
   }

   public function checkoutStore(Request $request){

      $this->validate($request,[
         'name'=>'required',
         'email'=>'required',
         'phone'=>'required',
         'payment_id'=>'required',
      ]); 

         $order = new Order();
       if(Auth::user()){
            $order->user_id = $request->user_id;

       }
         $order->ip_address = $request_ip = request()->ip();
         $order->email = $request->email;
         $order->name = $request->name;
         $order->phone = $request->phone;
         $order->shipping_address = $request->shipping_address;
         $order->reference_id = $request->reference_id;
         $order->payment_id = $request->payment_id;
         $order->save();


         if(Auth::user()){
       $lastOrder = Order::where('ip_address',$request_ip)->where('user_id',$request->user_id)->get()->last();

       }else{
       $lastOrder = Order::where('ip_address',$request_ip)->get()->last();

       }

       $carts = ShoppingCart::where('ip_address', $request_ip)->where('order_id',null)->get();

       foreach($carts as $cart)
           {
            $cart->order_id = $lastOrder->id;
             $cart->save();

           } 

        return redirect('/')->with('message','Registation successfully');

   }


   
}
