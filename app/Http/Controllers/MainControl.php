<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainControl extends Controller
{
    public function home(){
        $mycate=Category::where('id',7)->first();
        $product=Product::all();
        return view('home1',compact('mycate','product'));
    }
    public function dashbord(){
        return view('dashbord');
    }
}
