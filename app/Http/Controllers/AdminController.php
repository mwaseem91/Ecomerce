<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    public function login(){
        
        return view('admin.login');
    }
    public function makelogin(Request $Request){
       
        $data= array(
            'email'=>$Request->email,
            'password'=>$Request->password,
            'role'=>'admin'
        );
        if(Auth::attempt($data))
        {
            return redirect()->route('admin.dashboard');
        }
        else{
            return back()->withErrors(['message'=>'invald email or password']);
        }
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
