<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
use Illuminate\Support\Facades\Hash;
class ProductsController extends Controller
{

    public function addproduct(){
        $level = Category::where(['parentId'=>0])->get();
        $sublevel = Category::where('parentId','!=',0)->get();
        return view('admin/products/add_products')->with(compact('level','sublevel'));
    }
    
}
