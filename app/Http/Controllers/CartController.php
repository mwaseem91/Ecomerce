<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $data= array(
            'product_id' => $request->product_id,
            'qnty'=>$request->qnty,
            'user_id'=>Auth::user()->id,
        );
        Cart::create($data);
        return redirect()->route('cart');
    }

    
    public function show(Cart $cart)
    {
        //
    }

    public function edit(Cart $cart)
    {
        //
    }

   
    public function update(Request $request, Cart $cart)
    {
        //
    }

    public function destroy(Cart $cart, Request $request)
    {
        $id=$request->id;
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->route('cart');
    }
}
