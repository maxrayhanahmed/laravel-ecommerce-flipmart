<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Payment;


class AdminPaymentControllr extends Controller
{
    public function paymentMethod($id=null){

    	    	$paymentById = Payment::find($id);
    	    	$payments = Payment::orderBy('priority','desc')->get();

    	return view('backEnd.payment.paymentMethod',['payments'=>$payments,'paymentById'=>$paymentById]);
    }


 	public function paymentStore(Request $request){

 		$this->validate($request,[
 			
 			'name'=>'required',
            'short_name'=>'required|unique:payments',
 			'priority'=>'required|numeric',
 		]);


 		if(isset($request->image)){
 		$image=$request->file('image');  
 
	        $originalName = $image->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/payments/';
	        $image->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

	    }else{ $imageUrl = null;}



    	    	$payments = new Payment();

    	    	$payments->name = $request->name;
    	    	$payments->short_name = $request->short_name;
    	    	$payments->no = $request->no;
    	    	$payments->type = $request->type;
    	    	$payments->priority = $request->priority;
    	    	$payments->image = $imageUrl;
    	    	$payments->save();

    	return back()->with('message_form','Payment Item save successfully');
    }



public function paymentMethodUpdate(Request $request){

 		$this->validate($request,[
 			
 			'name'=>'required',
 			'short_name'=>'required  | unique:payments,short_name,'.$request->paymentId,
 		]);
    	  $paymenById = Payment::find($request->paymentId);


 		if(isset($request->image)){
 		$image=$request->file('image');  

 		$old_path = $paymenById->image;
	    		if(!empty($old_path)){
	    			unlink($old_path);
	    		}
 
	        $originalName = $image->getClientOriginalName();

	        $div			=explode('.',$originalName);
			$f_ext			=strtolower(end($div));
	        $imageName = time().'.'.$f_ext;

	        $imagePath = 'public/backEnd/images/payments/';
	        $image->move($imagePath,$imageName);
	        $imageUrl  = $imagePath.$imageName;

	    }else{

	     $imageUrl = $paymenById->image;
	 }


    	    	$paymenById->name = $request->name;
    	    	$paymenById->short_name = $request->short_name;
    	    	$paymenById->no = $request->no;
    	    	$paymenById->type = $request->type;
    	    	$paymenById->priority = $request->priority;
    	    	$paymenById->image = $imageUrl;
    	    	$paymenById->save();

    	return redirect('admin/payment-method')->with('message_list','Payment Item update successfully');
    }



	public function paymentDelete($id){
    	$paymenById = Payment::find($id);
    	$Image = $paymenById->image;
			 if(!empty($Image)){
				unlink($Image);
			 }
			 
    	$paymenById->delete();
    	
    	return redirect('admin/payment-method')->with('message_list','Payment Item delete successfully');

    }
    



}
