<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\siteTitle;


class AdminDashboardController extends Controller
{
    
	 public function Dashboard(){
	 	$siteTitle = siteTitle::all();
    	return view('backEnd.home.homeContent',['siteTitle'=>$siteTitle]);
    }
}
