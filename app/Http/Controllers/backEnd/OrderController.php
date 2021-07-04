<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\ShoppingCart;
use App\Menu;
use App\Logo;
use App\Information;

use PDF;

class OrderController extends Controller
{
    public function orderManage(){
    	    $orders= Order::all();

    	return view('backEnd.order.orders',['orders'=>$orders,]);

    }

    //public $order;

    public function show($id){
    	    $orderById= Order::find($id);

    	    if($orderById->is_seen_by_admin==0){
            	$orderById->is_seen_by_admin = 1;
            	$orderById->save();
            }

            $order = new Order();
               // $order->test($id);
                $order->subTotal($id);
                $order->total($id);
          
    	    $cartItemes = ShoppingCart::where('order_id',$id)->get();

          

    	return view('backEnd.order.orderDetail',compact('orderById','cartItemes'));

    }

    	public function orderDelete($id){
    		$orderById = Order::find($id);
    		$orderById->delete();
    		$carts = ShoppingCart::where('ip_address', request()->ip())
		            //->where('user_id', $orderById->user_id)
		            ->where('order_id',$id)->get();
		       foreach($carts as $cart)
		           {
		             $cart->delete();

		           } 
			return back()->with('delete_success','This item delete successfully');
    	}


	public function paid($id){

    	  $orderById = Order::find($id);
    	  if($orderById->is_paid==0){
    	  $orderById->is_paid = 1;
    	  }else{
    	  $orderById->is_paid = 0;
    	  }
    	  $orderById->save();


    	return back();

    }

    public function complete($id){

    	  $orderById = Order::find($id);
    	  if($orderById->is_completed==0){

    	  $orderById->is_completed = 1;
    	  }else{

    	  $orderById->is_completed = 0;
    	  }

    	  $orderById->save();


    	return back();

    }


     public function orderUpdate(Request $request){


             $count = count(collect($request)->get('id'));
       
        for($i=0;$i<$count;$i++)
           {

            ShoppingCart::where('id', $request->id[$i])
                 ->update(['product_qty' => $request->qty[$i]]);
           } 
         return back()->with('success','Cart update successfully ');

    }


  public function cost_discount(Request $request){


       
        $order = Order::find($request->order_id);

        $order->shipping_cost = $request->shipping_cost;
        $order->discount = $request->discount;
        $order->save();
      
           
         return back()->with('success','Update successfully ');

    }

 public function viewOrderPdf($id){


       
        $invoice = Order::find($id);
        $logo = Logo::all();
        $informations = Information::all();

        $pdf = PDF::loadView('backEnd.order.invoice', compact('invoice','logo','informations'));
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');

           
         //return back()->with('success','Update successfully ');

    }


    
   

    

    
}
