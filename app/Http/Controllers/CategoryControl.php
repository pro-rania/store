<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryControl extends Controller
{
    public function index(){
        return response()->json(['message'=>'success']);
    }
    public function insert(Request $request){
        $this->validate($request,['name'=>'required']);
        $category=new Category();
        $category->name=$request->name;
        $category->save();
        return response()->json(['message'=>'success','category'=>$category]);
    }
    public function update(Request $request,$id){
        $this->validate($request,['name'=>'required']);
        $category=Category::find($id);
        $category->name=$request->name;
        $category->update();
        return response()->json(['message'=>'success','category'=>$category]);
    }
    public function remove($id){
        $category=Category::find($id);
        if($category !=null || $category !=''){
        $category->delete();
        return response()->json(['message'=>'success']);
        }
        return response()->json(['message'=>'fail']);
    }
}
