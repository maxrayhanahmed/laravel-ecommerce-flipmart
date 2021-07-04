<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Payment;
use App\ShoppingCart;

class Order extends Model
{
    public $fillable = [
        'user_id',
        'ip_address',
    	'payment_id',
    	'phone',
    	'email',
    	'name',
    	'shipping_address',
    	'is_paid',
    	'is_completed',
    	'is_seen_by_admin'
    ];

   public function user()
    {
        return $this->belongsTo(User::class);
    }

   public function payment()
    {
        //return $this->belongsTo(Payment::class);
        return $this->hasOne('App\Payment','id', 'payment_id');

    }


    public function cart()
        {
        return $this->hasMany(ShoppingCart::class);

        }


        public function subTotal($id)
        {
            $cartItems = ShoppingCart::where('order_id',$id)->get();
               
                    
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

       



    public function total($id)
        {
             

            $cartItems = ShoppingCart::
           // where('ip_address', request()->ip())
            //->where('user_id', $orderById->user_id)
            where('order_id',$id)->get();
               
               
                    
            $amount = 0;
            foreach($cartItems as $item){
               $amount += $item->product->productPrice*$item->product_qty;
            }

            return $amount+$amount*$this->tax();

        }

   

}
