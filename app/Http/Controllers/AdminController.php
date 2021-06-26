<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){

        $users = User::all();

        return view('Admin.admin',['users'=>$users]);
    }

    public function adduser(){

        return view('Admin.adduser');
    }

    public function createuser(Request $request){

//        return $request->all();

        User::create(\request()->except(['password_confirmation','password']) + ['password'=>Hash::make($request->password)]);

        return redirect('/admin')->with('Useradded','Blogger has been created!');
    }

    public function showuserposts($user_id){

    return view('Admin.admin',['posts'=>User::find($user_id)->posts]);

    }
}
