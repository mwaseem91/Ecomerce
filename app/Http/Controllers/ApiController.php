<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function list()
    {
        $list= Category::get();
       return $list;
    }
    public function store(Request $request)
    {
       $cat =  new Category;
       $cat->name=$request->name;
       $cat->category_id=$request->category_id;
        
        $create =$cat->save();

        if($create)
        {
        return ["data"=>"data saved successfull"];
        }
        else{
            return ["data"=>"data not saved "];
        }
    }
    public function update(Request $request, Category $category)
    {
        $id = $request->id;
        $data=array(
            'name' => $request->name,
            'category_id' => $request->category_id,
        );
        $category= Category::find($id);
        $update=$category->update($data);
        
        if($update)
        {
        return ["data"=>"data update successfull"];
        }
        else{
            return ["data"=>"data not update "];
        }
    }
    function delete($id)
    {
        $cat =Category::find($id);
       $result= $cat->delete();
       if($result)
       {
       return ["data"=>"data delete successfull"];
       }
       else{
           return ["data"=>"data not delete "];
       }
    }


    function index(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }
}
