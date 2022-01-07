<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\productDetail;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::get();
        return view('admin/product/index',compact('products'));
    }
    public function create()
    {
        $categories=Category::whereNotNull('category_id')->get();
        return view('admin/product/add',compact('categories'));
    }
    public function store(Request $request)
    {
       $data= array(
           'name'=>$request->name,
           'category_id'=>$request->category_id,
           'price'=>$request->price,
       );
       if($request->hasFile('image'))
       {
        $image = $request->File('image');
        $file_name =date('dmY').time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/upload'),$file_name);
        $data['image'] = $file_name; 
       }
       $cteate = Product::create($data);
       return redirect()->route('products.create');
    }

   
    public function show(Product $product)
    {
        return "show";
    }
    public function edit(Product $product)
    {
        $id =$product->id;
        $product = Product::findOrFail($id);
        $categories= Category::whereNotNull('category_id')->get();
        return view('admin/product/edit',compact('product','categories'));
    }
    public function update(Request $request, Product $product)
    {
        $id=  $product->id;
        $data= array(
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
        );
        if($request->hasFile('image'))
        {
         $image = $request->File('image');
         $file_name =date('dmY').time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('/upload'),$file_name);
         $data['image'] = $file_name; 
        }
        $cteate = Product::where('id',$id)->update($data);
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    
    // public function extraDetailsStore(Request $request)
    // {
    //     $id=  $request->id;
    //     $data= array(
    //         'title'=>$request->title,
    //         'product_id'=>$request->product_id,
    //         'total_item'=>$request->total_item,
    //         'description'=>$request->description,
    //     );
    //     $details = ModelsProductDetail::updateOrCreate(
    //         ['product_id'=>$id ],
                
    //         $data
    //     );
    //     return redirect()->route('products.index');
    // }
}