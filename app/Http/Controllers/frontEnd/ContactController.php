<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   public function contact(){

    	
	//$blogs = Blog::where('publication_status','1')->paginate(3);

    	return view('frontEnd.contact.contact');
    }
}
