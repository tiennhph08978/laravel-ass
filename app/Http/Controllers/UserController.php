<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function getList(){
        $users = User::all();
        return view('admin.user.list',['users'=>$users]);
    }
}
