<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\siteTitle;


class AdminSettingController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    ////////  fuunctions for setting add  /////

     public function titleAdd()
    {
    	$siteTitles= siteTitle::all();

    	return view('backEnd.settings.title',['siteTitles'=>$siteTitles]);

    }


    ////////  fuunctions for title update  /////

     public function titleUpdate(Request $request)
    {

    	$this->validate($request,[
 			'siteTitle'=>'required',
 		]);
 			$siteTitle = siteTitle::find($request->id);
			$siteTitle->siteTitle = $request->siteTitle;
			$siteTitle->save();
			
        return back()->with('message_form','Site Title update successfully');

    }



}
