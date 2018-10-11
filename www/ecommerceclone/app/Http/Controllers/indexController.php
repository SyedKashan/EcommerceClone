<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class indexController extends Controller
{
    public function index (){
        $products = Product::with('categories')->get();
        $disProduct = Product::where(['id'=>15])->first();
        $categories = Category::where(['parentId'=>0])->get();
        $subcategories = Category::where('parentId','>',0)->get();

        
        return view('frontView/index')->with(compact('products','disProduct','categories','subcategories'));
    }
    public function error(){
        return view('frontView/404');
    }
}
