<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Session;
// use Illuminate\Support\Facades\Hash;
// use Image;
// use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Input;
class ProductsController extends Controller
{

    public function addproduct(request $request){
        if($request->isMethod('post')){
            $data = $request->all(); 
            
             print_r($request);die;
            $levels = Category::where(['id'=>$data['parentId']])->get();
            foreach($levels as $level){
                $catvalue = $level->id;
            }
             $product = new Product;
             $product->productname = $data['productname'];
             $product->subCategoryId = $data['parentId'];
             $product->productCode = $data['code'];
             $product->productColor = $data['color'];
             $product->description = $data['description'];
             $product->url = $data['url'];
             $product->price = $data['price'];
             $product->categoryId = $catvalue;

            //  $filename = '';
             
            //  if($request->hasFile('image'))
            //  {
            //      $image_tmp = Input::file('image');
            //      dd($image_tmp);die;
            //      if($image_tmp->isValid())
            //      {
            //          $extension = $image_tmp->getClientOriginalExtension();
            //          $filename = rand(111,99999).".".$extension;
            //          $large_image_path = 'svg/backendImages/products/largeimage/'.$filename;
            //          $medium_image_path = 'images/backendImages/products/mediumimage/'.$filename;
            //          $small_image_path = 'images/backendImages/products/smallimage/'.$filename;
            //        //Image Resize
            //          Image::make($image_tmp)->save($large_image_path);
            //          Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
            //          Image::make($image_tmp)->resize(300,300)->save($small_image_path);         
            //          //Store image name in products table
            //          $product->image = $filename; } 
                
            //  }
            //  else{
            //      $product->image = "NoImageFound.jpg";
            //  }
             $product->save();

        }

        $level = Category::where(['parentId'=>0])->get();
        $sublevel = Category::where('parentId','!=',0)->get();
        return view('admin/products/add_products')->with(compact('level','sublevel'));
    }
    
}
