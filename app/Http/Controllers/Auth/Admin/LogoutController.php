<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
   public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        return redirect()->route('admin.login');

    }

}
