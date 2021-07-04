


@extends('backEnd.master')


@section('mainContent')


      <div id="page-wrapper">
      	  <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Customer Orders</h2>
                    <h3 class="text-success">{{Session::get('message_form')}}</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <div class="row">

        <div class="col-md-6">
            <p>
                <div><h4><span>Name :</span> {{$orderById->name}}</h4></div>
                
                
                <div><h4><span>Phone :</span> {{$orderById->phone}}</h4></div>

                <div><h4><span>Email :</span> {{$orderById->email}}</h4></div>

                <div><h4><span>Shipping Address :</span> {{$orderById->shipping_address}}</h4></div>
            
            </p>
        </div>
        <div class="col-md-6">
            <p>
                <div><h4><span>Shipping Method :</span> {{$orderById->payment->short_name}}</h4></div>

                <div><h4><span>Payment No :</span> {{$orderById->payment->no}}</h4></div>

                <div><h4><span>Shipping Type :</span> {{$orderById->payment->type}}</h4></div>

                <div><h4><span>Refarence ID :</span> </h4></div>
            </p>
        </div>


    </div>

    <div class="shopping-cart-table ">
    <div class="table-responsive">
        <form action="{{route('admin.order.update')}}" method="post">
            @csrf
        <table class="table">
            <thead>
                <tr>
                    <th class="cart-romove item">Remove</th>
                    <th class="cart-description item">Image</th>
                    <th class="cart-product-name item">Product Name</th>
                    <th class="cart-product-name item">Price</th>
                    <th class="cart-qty item">Quantity</th>
                    <th class="cart-sub-total item">Subtotal</th>
                </tr>
            </thead><!-- /thead -->
     
            
            <tbody>
                <?php $subTotal = 0; ?>

            @foreach($cartItemes as $cartIteme) 


                <tr>
                    <td class="romove-item">
                            
                        <a href="{{route('cart.remove',$cartIteme->id)}}" title="cancel" class=""><i class="fa fa-trash-o"></i></a>


                    </td>
                    <td class="cart-image">
                        <a class="entry-thumbnail" href="{{route('product.details',$cartIteme->id)}}">
                            <img width="100" src="{{asset($cartIteme->product->image[0]['product_image'])}}" alt="">
                        </a>
                    </td>
                    <td class="cart-product-name-info">
                         <h4 class='cart-product-description'><a href="{{route('product.details',$cartIteme->id)}}">
                            {{$cartIteme->product->title}}</a></h4>
                        
                    </td>
                    <td class="cart-product-price">
                        {{$cartIteme->product->price}}
                    </td>
                   
                    <td class="cart-product-quantity">
                        <div class="quant-input">
                                <div class="arrows">
                                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                </div>
                                <input type="text" name="qty[]" value="{{$cartIteme->product_qty}}">
                                <input type="hidden" name="id[]" value="{{$cartIteme->id}}">
                          </div>
                    </td>
                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"></span>
                        {{$cartIteme->product_qty * $cartIteme->product->price}} Taka

                        <?php 
                        $subTotal += $cartIteme->product_qty * $cartIteme->product->price;
                        ?> 
                    </td>
                </tr>

                @endforeach
            </tbody><!-- /tbody -->

            <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="">
                            <span>

                                @if(!$orderById->is_paid == null)

                                    <a href="{{url('admin/order/is_paid/'.$orderById->id)}}" class="btn btn-success">Paid</a>
                                @else
                                    <a href="{{url('admin/order/is_paid/'.$orderById->id)}}" class="btn btn-danger">Unpaid</a>
                                @endif
                        

                                @if(!$orderById->is_completed == null)

                                    <a href="{{url('admin/order/is_complete/'.$orderById->id)}}" class="btn btn-success">Order Complite</a>
                                @else
                                    <a href="{{url('admin/order/is_complete/'.$orderById->id)}}" class="btn btn-danger">Order Uncomplite</a>

                                @endif

                                <a href="{{route('view.roder.pdf',$orderById->id)}}" target="_blank" class="btn btn-default">Invoice pdf</a>

                        </span>




                            
                            <span class="">
                                
                                <button type="submit" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart
                                    
                                </button>
                            </span>
                        </div><!-- /.shopping-cart-btn -->
                    </td>
                </tr>
            </tfoot>


        </table><!-- /table -->
    </form>

    </div>
</div><!-- /.shopping-cart-table -->
<div class="row">
   <div class="col-md-4 col-sm-12 cart-shopping-total">
   
    <table class="table">
        <thead>
            <tr>
                <th>
                    <div class="cart-sub-total">
                        Total : <span class="inner-left-md"> 
                        <?php



                         $cartItems =App\ShoppingCart::where('order_id',$orderById->id)->get();
                        $amount = 0;
                        foreach($cartItems as $item){
                           $amount += $item->product->price*$item->product_qty;
                        }

                       echo $amount;
                         ?>
                         Taka </span>

                    </div>
                    <div class="cart-grand-total">
                        Grand Total : <span class="inner-left-md"> 
                            <?php $obj =new App\Order; ?>

                        {{$amount + $amount * $obj->tax()}}Taka</span>


                    </div>
                </th>
            </tr>
        </thead><!-- /thead -->
        
    </table><!-- /table -->
</div><!-- /.cart-shopping-total -->  


</div>
<div class="row">
    <div class="col-md-5">
    
 <form action="{{route('admin.cost_discount.update')}}" method="post">
        @csrf

            <input type="hidden" name="order_id" value="{{$orderById->id}}">

         <div class="form-group">
            <label class="info-title" for="shipping_cost">Shipping Cost : </label>
            <input type="number" name="shipping_cost" value="{{$orderById->shipping_cost}}" class="form-control" id="shipping_cost" placeholder="">
            
         </div>
        <div class="form-group">
            <label class="info-title" for="discount">Spacial Discount : </label>
            <input type="number" name="discount" value="{{$orderById->discount}}" class="form-control" id="discount" placeholder="">
            
         </div>
         <button class="btn btn-info" type="submit">Update</button>


    </form>
</div>
     
</div>
</div>
@endsection