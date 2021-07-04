<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{ $invoice->name }}</title>
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            h1,h2,h3,h4,h5,h6,p,span,div { 
                font-family: DejaVu Sans; 
                font-size:10px;
                font-weight: normal;
            }
            th,td { 
                font-family: DejaVu Sans; 
                font-size:10px;
            }
            .panel {
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }
            .panel-default {
                border-color: #ddd;
            }
            .panel-body {
                padding: 15px;
            }
            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0px;
                border-spacing: 0;
                border-collapse: collapse;
                background-color: transparent;
            }
            thead  {
                text-align: left;
                display: table-header-group;
                vertical-align: middle;
            }
            th, td  {
                border: 1px solid #ddd;
                padding: 6px;
            }
            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }
        </style>
        @if($invoice->duplicate_header)
            <style>
                @page { margin-top: 140px;}
                header {
                    top: -100px;
                    position: fixed;
                }
            </style>
        @endif
    </head>
    <body>
        <header>
            <div style="position:absolute; left:0pt; width:250pt;">
            	@foreach($logo as $logo)
                <img class="img-rounded" height="120px" src="{{ asset($logo->logo_image) }}">
                @endforeach
            </div>
            <div style="margin-left:300pt;">
                <b>Date: </b> 12/12/12<br />
                    <b>Due date: </b>{{$invoice->created_at}}<br />
                    <b>Invoice : </b> #LE{{ $invoice->id }}
                <br />
            </div>
            <br />
            <h2>{{ $invoice->title }} {{ $invoice->id ? '#LE' . $invoice->id : '' }}</h2>
        </header>
        <main>
            <div style="clear:both; position:relative;">
                <div style="position:absolute; left:0pt; width:250pt;">
                    <h4>Business Details:</h4>
                    <div class="panel panel-default">
                         <div class="panel-body">
                            @foreach($informations as $information)
                           Name : {{ $information->name}}<br />
                            ID: {{ $information->id }}<br />
                           Phone : {{ $information->phone}}<br />
                           Phone : {{ $information->email}}<br />
                            Shipping Address{{ $information->address }}
                            @endforeach
                            <br />
                            <br />
                        </div>
                    </div>
                </div>
                <div style="margin-left: 300pt;">
                    <h4>Customer Details:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            
                           Name : {{ $invoice->name}}<br />
                            ID: #LE{{ $invoice->id }}<br />
                           Phone : {{ $invoice->phone}}<br />
                           Email : {{ $invoice->email}}<br />
                            Shipping Address{{ $invoice->shipping_address }}
                            <br />
                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <h4>Items:</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                            <th>Image</th>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quintity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice->cart as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td> <img width="60px" src="{{asset($item->product->image[0]['product_image'])}}"></td>
                           
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->product->price }} taka </td>
                            <td>{{ $item->product_qty }} </td>
                            <td>{{ $item->product->price * $item->product_qty}} taka</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="clear:both; position:relative;">
                @if($invoice->notes)
                    <div style="position:absolute; left:0pt; width:250pt;">
                        <h4>Notes:</h4>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{ $invoice->notes }}
                            </div>
                        </div>
                    </div>
                @endif
                <div style="margin-left: 300pt;">
				<h4>Total</h4>
                       <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Subtotal</b></td>
                                <td>
                                	<?php



                         $cartItems =App\ShoppingCart::where('order_id',$invoice->id)->get();
                        $amount = 0;
                        foreach($cartItems as $item){
                           $amount += $item->product->price*$item->product_qty;
                        }

                       echo $amount;
                         ?> Taka
                                </td>
                            </tr>

                                <tr>
                                    <td>
                                        <b>
                                            tax
                                        </b>
                                    </td>
                                    <td>21 %</td>
                                </tr>
                            <tr>
                                <td><b>Shipping Cost</b></td>
                                <td>{{ $invoice->shipping_cost}} Taka</td>
                            </tr>
                            <tr>
                                <td><b>Discount</b></td>
                                <td>{{ $invoice->discount}} Taka</td>
                            </tr>

							<tr>
                                <td><b>TOTAL</b></td>
                                <td>{{ $amount + $amount * 21/100 + $invoice->shipping_cost - $invoice->discount }} Taka</td>
                            </tr>



                        </tbody>
                    </table>
                    
                </div>
            </div>
            @if ($invoice->footnote)
                <br /><br />
                <div class="well">
                    {{ $invoice->footnote }}
                </div>
            @endif
        </main>

        <!-- Page count -->
       
    </body>
</html>