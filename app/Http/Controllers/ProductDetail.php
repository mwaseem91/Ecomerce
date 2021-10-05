<?php

namespace App\Http\Controllers;

use App\Models\DetailModel;
use App\Models\Product;
use App\Models\ProductDetail as ModelsProductDetail;
use Illuminate\Http\Request;

class ProductDetail extends Controller
{
    public function extraDetail(Request $request)
    {
        $id = $request->id;
        $product= Product::where('id', $id)->with('Prodetail')->first();
        $category = $product->category_id;
        $related_product =Product::where('category_id',$category)->get();
        return view('admin.product.extraDetails',compact('id', 'product'));
        
    }
    public function extraDetailStore(Request $request)
    {
        $id = $request->id;
        $data= array(
            'title'=>$request->title,
            'product_id'=>$id,
            'total_item'=>$request->total_item,
            'description'=>$request->description,
        );
        
        $details =DetailModel::updateOrCreate(
            ['product_id'=>$id ],
                
            $data
        );
        return redirect()->route('products.index');
    }

    
}


