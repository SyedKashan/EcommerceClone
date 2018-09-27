<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class indexController extends Controller
{
    public function index (){
        $products = Product::all();
        $disProduct = Product::where(['id'=>15])->first();
        $categories = Category::where(['parentId'=>0])->get();
        $subcategories = Category::where('parentId','>',0)->get();

        
        return view('frontView/index')->with(compact('products','disProduct','categories','subcategories'));
    }
}
