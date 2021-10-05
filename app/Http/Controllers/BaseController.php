<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BaseController extends Controller
{
    function home(){
        if(auth::id())
        {
            return redirect('redirect');
        }
        $products = Product::get();
        $new_products = Product::limit(6)->latest()->get();
        return view('front.home',compact('products','new_products'));
    }
    function contant(){
        return view('front.contant');
    }
    function delivery(){
        return view('front.delivery');
    }
    function spacialOffer(){
        return view('front.spacialOffer');
    }
    function product(Request $request){
        $id = $request->id;
        $product = Product::where('id',$id)->with('Prodetail')->first();
        return view('front.productView',compact('product'));
    }
    function cart(){
        $carts =[];
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $carts= Cart::where('user_id',$user_id)->get();
        }
        return view('front.cart',compact('carts')); 
    }
    function user_login(){
        return view('front.login'); 
    }
    function login_check(Request $request){
        $data = array(
            'email'=>$request->email,
            'password'=> $request->password,
        );
        if(Auth::attempt($data))
        {
            return redirect()->route('home');
        }
        else{
            return back()->withErrors(['message'=>'invald email or password']);
        }

    }
    function user_logout()
    {
        Auth::logout();
        return redirect()->route('user_login');
    }
    public function user_store(Request $request){
        $data = array(
            'name' => $request->first_name.' '.$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        );
        $user= User::create($data);
        return redirect()->route('user_login'); 
    }

    function redirect()
    {
        
     $usertype= Auth::user()->utype;
     if( $usertype == 'admin')
        {
            return view('admin.dashboard');
        }
        else{
            $products = Product::get();
            $new_products = Product::limit(6)->latest()->get();
            return view('front.home',compact('products','new_products'));
        }
    }
}
