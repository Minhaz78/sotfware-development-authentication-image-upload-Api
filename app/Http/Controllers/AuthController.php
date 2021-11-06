<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginstore(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email','=', $email)
        ->where('password','=', $password)
        ->first();
        if(!$user)
        {
            return redirect()->back()->with('err_msg','Invalid email or password');
        }
        else{
            //store user data in session
        //step;1
        $request->session()->put('username',$user->name);
        $request->session()->put('useremail',$user->email);
        $request->session()->put('userrole',$user->role);
        return redirect()->to('/dashboard');

        }

 }
  public function dashboard(){
        return view('dashboard');
    }
    public function student(){
        return view('student');
    }
    public function teacher(){
        return view('teacher');
    }

}
