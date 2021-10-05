<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductBooking;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;
use Omnipay\Omnipay;

class ProductBookingController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function create()
    {
        //
    }

  
    public function store(Request $request) {

        $cart_ids = $request->ids;
        $data     = array();
        $amount   = 0;
        foreach ($cart_ids as $i=>$value) 
        {
            $cart                   = Cart::find($value);
            $amount                 =$amount+ $cart->price;
            $data[$i]['user_id']    = $cart->user_id;
            $data[$i]['product_id'] = $cart->product_id;
            $data[$i]['qnty']       = $cart->qnty;
            $data[$i]['payment_status'] = '0';
        }
        
        $productBook=ProductBooking::insert($data);
        $book_ids=ProductBooking::orderby('id','desc')->take(count($data))->pluck('id');
        if($productBook)
        {
        Cart::destroy($cart_ids);
        }
       
        
    }
   

  

    
    public function show(ProductBooking $productBooking)
    {
        //
    }

 
    public function edit(ProductBooking $productBooking)
    {
        //
    }

    
    public function update(Request $request, ProductBooking $productBooking)
    {
        //
    }

   
    public function destroy(ProductBooking $productBooking)
    {
        //
    }
}