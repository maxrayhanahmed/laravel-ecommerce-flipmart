<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class ShoppingCart extends Model
{

public $fillable = [
    	'product_id',
        'user_id',
    	'ip_address',
    	'order_id',
    	'product_qty',
    ];


   public function user()
        {
            return $this->belongsTo(User::class);
        //return $this->belongsTo('App\Post', 'foreign_key', 'other_key');

        }
    public function product()
        {
            //return 'hasan';
            return $this->belongsTo('App\Product');
            //return $this->belongsTo('App\Product', 'product_id', 'id');

        }
    public function order()
        {
            return $this->belongsTo('App\Order');
        }

        //protected $tax = 15;

    public function totalItems()
        {
            if(Auth::check()){
                 $cart = ShoppingCart::where('user_id', Auth::id())
                            ->where('order_id', null)
                            ->get();
                }else{
                $cart = ShoppingCart::where('ip_address', request()->ip())
                                    ->where('order_id', null)
                                    ->get();
                }
                    
            $totalItem = 0;
            foreach($cart as $item){
               $totalItem += $item->product_qty;
            }

            return $totalItem;

        }

        
    public function subTotal()
        {
            
            if(Auth::check()){
                $cartItems = ShoppingCart::where('user_id', Auth::id())
                            ->where('order_id', null)
                            ->get();
                }else{
                $cartItems = ShoppingCart::where('ip_address', request()->ip())
                            ->where('order_id', null)
                            ->get();
                }
               
                    
            $amount = 0;
            foreach($cartItems as $item){
               $amount += $item->product->price*$item->product_qty;
            }

            return $amount;

        }

     public function tax()
        { 
            $tax = 15;
            return  $tax/100;
        }

    public function total()
        {
           if(Auth::check()){
                $cartItems = ShoppingCart::where('user_id', Auth::id())
                            ->where('order_id', null)
                            ->get();
                }else{
                $cartItems = ShoppingCart::where('ip_address', request()->ip())
                            ->where('order_id', null)
                            ->get();
                }
               
                    
            $amount = 0;
            foreach($cartItems as $item){
               $amount += $item->product->price*$item->product_qty;
            }

            return $amount+$amount*$this->tax();

        }

        


}
