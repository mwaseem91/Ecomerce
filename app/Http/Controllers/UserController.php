<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(){
        $user = User::get();
        return view('admin.user.index',compact('user'));
    }

    
    public function delete(Request $request){
        $id= $request->id;
        $user= User::find($id);
        $user->delete();
       // return redirect()->route('admin.user');
    }
   
}
