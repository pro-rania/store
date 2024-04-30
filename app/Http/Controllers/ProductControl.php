<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class ProductControl extends Controller
{
    public function index(){
       $products=Product::paginate(10);
       return view('product.index',compact('products'));
    }
    public function create(){
        $category=Category::all();
        return view('product.create',compact('category'));
    }
    public function insert(Request $request){
        $this->validate($request,['name'=>'required','price'=>'required','description'=>'required','image'=>'required']);
        $product=new Product;
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->file('image')){
            $image=$request->file('image');
            $filename=time().'_'.$image->getClientOriginalName();
            $filename=str_replace(' ','-',$filename);
            $image->move('images/product',$filename);
            $product->image='product'.'/'.$filename;
        }
        $product->category_id=$request->category_id;
        $product->save();
        return redirect()->route('product.index');
    }
    public function edit($id){
        $category=Category::all();
        $product=Product::find($id);
        return view('product.edit',compact('category','product'));
    }
    public function update(Request $request,$id){
        $this->validate($request,['name'=>'required','price'=>'required','description'=>'required','image'=>'required']);
        $product= Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->description=$request->description;
        if($request->file('image')){
            $image=$request->file('image');
            $filename=time().'_'.$image->getClientOriginalName();
            $filename=str_replace(' ','-',$filename);
            $image->move('images/product',$filename);
            $product->image='product'.'/'.$filename;
        }
        $product->category_id=$request->category_id;
        $product->update();
        return redirect()->route('product.index');
    }
    public function remove($id){
        $product=Product::find($id);
        $del='images/'.$product->image;
        if(File::exists($del)){
            File::delete($del);
        }
        $product->delete();
        return redirect()->route('product.index');
    }
    public function search(Request $request){
        if($request->ajax()){
          $data = Category::where('name','LIKE','%'.$request->name.'%')->get();
          $result = "";
          if(count($data)>0){
            $result = "<ul>";
            foreach($data as $item){
            $result .= "<li>".$item->name."</li>";
            }
            $result .= "<ul>";
          }else{
              $result .= "<li>لا توجد بيانات</li>";
          }
          return $result;
        }
        return view('search');
      }
}
