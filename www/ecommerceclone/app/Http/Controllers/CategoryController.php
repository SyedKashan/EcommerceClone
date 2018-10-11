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
        $level = Category::where(['parentId'=>0])->get();
       return view('admin/categories/add_category')->with(compact('level'));
    }
    public function add(Request $request){
        
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name = $data['categoryname'];
            $category->parentId = $data['parentId'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            if(!empty($data['status'])){$status=1;}
            else{
                $status=0;
            }
            $category->status = $status;
            $category->save();
            return redirect('/admin/view_category')->with('flash_message_error','Category Created!');
    }
}
public function viewcategory(){
    $categories = Category::get();
    $parents = Category::where(['parentId' => 0])->get();

    return view('admin/categories/view_category')->with(compact('categories','parents'));
}

public function vieweditcategory(Request $request, $id = null){
    $editableCategory= Category::where(['id'=>$id])->first();
    $level = Category::where(['parentId'=>0])->get();
    return view('/admin/categories/edit_category')->with(compact('editableCategory','level'));
}



public function editcategory(Request $request, $id = null){
  

    if($request->isMethod('post'))
    {
        $data = $request->all();
        $editableCategory= Category::where(['id'=>$id])->first();
        $editableCategory->name = $data['categoryname'];
        $editableCategory->description = $data['description'];
        $editableCategory->parentId = $data['parentId'];
        $editableCategory->url = $data['url'];
        if(!empty($data['status'])){$status=1;}
            else{
                $status=0;
            
            }
            $editableCategory->status = $status;
        $editableCategory->save();
        return redirect('/admin/view_category');
    }
}

public function deletecategory($id = null){
        $editableCategory= Category::where(['id'=>$id])->first();
        $editableCategory->delete();
        return redirect('/admin/view_category');
    }
}