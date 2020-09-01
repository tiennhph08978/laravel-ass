<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LogoutController extends Controller
{
    //
    public function logOut(){
        // if(Auth::check()){
        //     view()->share('nguoidung',Auth::user());
        // }
        Auth::logout();
        return redirect()->route('Auth.showLogin');
    }
}
