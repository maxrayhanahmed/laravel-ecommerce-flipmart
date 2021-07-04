<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\ShoppingCart;

class FrontEndCartController extends Controller
{

    public function manageCart(){

        //$cartItemes = ShoppingCart::where('order_id',null)->get();
        if(Auth::check()){
           $cartCount = ShoppingCart::where('order_id',null)
            ->where('user_id',Auth::user()->ip)
            ->count();
        }else{
        $cartCount = ShoppingCart::where('order_id',null)
            ->where('ip_address',request()->ip())
            ->count();
        }
        if(Auth::check()){
                 $carts = ShoppingCart::where('user_id', Auth::id())
                            ->where('order_id', null)
                            ->get();
                }else{
                $carts = ShoppingCart::where('ip_address', request()->ip())
                                    ->where('order_id', null)
                                    ->get();
                }

    	return view('frontEnd.cart.cart',compact('cartCount','carts'));

    }

    public function productAddToCart(Request $request){

        // dd($request->all());

        $this->validate($request,[
            'product_id'=>'required',
             
        ]);


        if(Auth::check()){
            $cart = ShoppingCart::where('user_id', Auth::id())
                            ->where('product_id', $request->product_id)
                            ->where('order_id', null)
                            ->first();
        }else{
            $cart = ShoppingCart::where('ip_address', request()->ip())
                            ->where('product_id', $request->product_id)
                            ->where('order_id', null)
                            ->first();
        }

       

        if(!is_null($cart)){
            $cart->increment('product_qty',$request->product_qty);
        }else{

        $cart = new ShoppingCart();


        if(Auth::check()){
            $cart->user_id = Auth::id();

        }

        $cart->product_id = $request->product_id;
        $cart->product_qty = $request->product_qty;
        $cart->ip_address = request()->ip();

        $cart->save();

         }

    	return back()->with('success','Product add to cart successfully');

        

    }

    public function  destroy($id){

         $cartById = ShoppingCart::find($id);

         $cartById->delete();
         return back();
  

    }


    public function cartUpdate(Request $request){

    $count = count(collect($request)->get('id'));

        //$count = ShoppingCart::where('order_id',null)->where('ip_address',request()->ip())->count();

        for($i=0;$i<$count;$i++)
           {

            ShoppingCart::where('id', $request->id[$i])
                 ->update(['product_qty' => $request->qty[$i]]);
           } 
         return back();

    }

}
