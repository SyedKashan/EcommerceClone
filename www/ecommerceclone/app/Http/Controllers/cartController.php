<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;


class cartController extends Controller
{
    public function showCart(){

    //$products = Product::where(['categoryId'=>$id])->get();
    $categories = Category::where(['parentId'=>0])->get();
    $subcategories = Category::where('parentId','>',0)->get();
    
    return view('/frontView/cart')->with(compact('categories','subcategories'));
    }
}
