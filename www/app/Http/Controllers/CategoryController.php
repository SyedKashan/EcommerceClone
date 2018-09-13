<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Category;
use Illuminate\Support\Facades\Hash;
class CategoryController extends Controller
{
    public function addCategory(){
       return view('admin/categories/add_category');
    }
    public function add(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name = $data['categoryname'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->save();
            return redirect('/admin/add_category')->with('flash_message_error','Category Created!');
    }
}
public function viewcategory(){
    return view('admin/categories/view_categories');
}
}