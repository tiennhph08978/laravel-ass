<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Auth;
use App\Http\Requests\Auth\LoginRequest;
// use User;
class AuthController extends Controller
{
    //
    public function showLogin(){

        if(Auth::check()){
            return redirect()->route('Category.list');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request){
        $result = Auth::attempt([
            'email' => request()->get('email'),
            'password' =>request()->get('password',)
        ], request()->get('remember'));

        if ($result){
            return redirect()->route('Category.list');
        }
        request()->flashOnly(['email']);
        return view('auth.login', [
            'message' =>__('auth.failed'),
        ]);
    }
    public function logOut(){
        // if(Auth::check()){
        //     view()->share('nguoidung',Auth::user());
        // }
        Auth::logout();
        return redirect()->route('Auth.showLogin');
    }
}
