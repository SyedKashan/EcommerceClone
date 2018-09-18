<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
use Illuminate\Support\Facades\Hash;
use Image;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
class ProductsController extends Controller
{

    public function addproduct(request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $var = $data['parentId']; 
            $levels = Category::where(['id'=>$var])->get();
            foreach($levels as $level){
                $levelval = $level->parentId;
            }
            $cats = Category::where(['id'=>$levelval])->get();
            foreach($cats as $cat){$catvalue = $cat->id;}
             $product = new Product;
             $product->productname = $data['productname'];
             $product->subCategoryId = $data['parentId'];
             $product->productCode = $data['code'];
             $product->productColor = $data['color'];
             $product->description = $data['description'];
             $product->url = $data['url'];
             $product->price = $data['price'];
             $product->categoryId = $catvalue;
             //image process
             $filename = '';
             if($request->hasFile('image'))
             {
                 $image_tmp = Input::file('image');
                 if($image_tmp->isValid())
                 {
                     $extension = $image_tmp->getClientOriginalExtension();
                     $filename = rand(111,99999).".".$extension;
                     $large_image_path = 'svg/backendImages/products/largeimage/'.$filename;
                     $medium_image_path = 'svg/backendImages/products/mediumimage/'.$filename;
                     $small_image_path = 'svg/backendImages/products/smallimage/'.$filename;
                   //Image Resize
                     Image::make($image_tmp)->save($large_image_path);
                     Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                     Image::make($image_tmp)->resize(300,300)->save($small_image_path);         
                     //Store image name in products table
                     $product->image = $filename; }
             }
             else{
                 $product->image = "NoImageFound.jpg";
             }
             $product->save();
             return redirect('/admin/view_products')->with('flash_message_error','Product added successfully!');
        }
        $level = Category::where(['parentId'=>0])->get();
        $sublevel = Category::where('parentId','!=',0)->get();
        return view('admin/products/add_products')->with(compact('level','sublevel'));
    }
     
    public function viewproducts(){
        $products = Product::get();
        $categories = Category::where('parentId','>',0)->get();
        
        return view('admin/products/view_products')->with(compact('products','categories'));
    }

    public function editproduct(request $request,$id = null){
        $editableproduct = Product::where(['id'=>$id])->get();
        return view('/admin/products/edit_product')->with(compact($editableproduct));

    }
}
