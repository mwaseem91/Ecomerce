<?php

namespace App\Http\Controllers;

use App\Models\Category;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
       // Category::get()
        $categories = Category::where('status','1')->get();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        $categories=Category::whereNull('category_id')->get();
        return view('admin.category.add',compact('categories'));
    }

   
    public function store(Request $request)
    {
       $data=array(
           'name'=>$request->name,
           'category_id'=>$request->category_id,
       );
       $create = Category::create($data);
       return redirect()->route('category.add');
    }

    public function edit(Request $request, Category $category)
    {
        $id = $request->id;
        $categories=Category::whereNull('category_id')->get();
        $category=Category::find($id);
        return view('admin.category.edit',compact('categories','category'));
    }

 // This method will update the specific record
    public function update(Request $request, Category $category)
    {
        $id = $request->id;
        $data=array(
            'name' => $request->name,
            'category_id' => $request->category_id,
        );
        $category= Category::find($id);
        $category->update($data);
        return redirect()->route('category.list');
    }

    // This method will delete the specific record
    public function destroy(Request $request, Category $category)
    {
        $id = $request->id;
        $category = Category::find($id);
        $category->delete(); 
        return redirect()->route('category.list');
    }

      // This method will delete the selected record

    public function selectedDelete(Request $request)
    {
        $ids = $request->ids;
        Category::whereIn('id',$ids)->delete(); 
        return response()->json(['success'=>"category have been deleted"]);
        // return redirect()->route('category.list');
    }
}
