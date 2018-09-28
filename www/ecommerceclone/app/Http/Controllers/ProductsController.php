<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductAttributes;
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
            $levels = Category::where(['id'=>$var])->first();
            // foreach($levels as $level){
            //     $levelval = $level->parentId;
            // }
            $level = $levels->parentId;
            $cats = Category::where(['id'=>$level])->first();
            //foreach($cats as $cat){}
                $catvalue = $cats->id;
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
        
        $editableproduct = Product::where(['id'=>$id])->first();
        if ($request->isMethod('post')){
            $data = $request->all();
            $var = $data['parentId'];
            $levels = Category::where(['id'=>$var])->first();
            $level =$levels->parentId;
            $cats = Category::where(['id'=>$level])->first();
            $cat = $cats->id;
            $editableproduct->productname = $data['product'];
            $editableproduct->subCategoryId = $data['parentId'];
            $editableproduct->productCode = $data['code'];
            $editableproduct->productColor = $data['color'];
            $editableproduct->description = $data['description'];
            $editableproduct->url = $data['url'];
            $editableproduct->price = $data['price'];
            $editableproduct->categoryId = $cat;
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
                    
                    $editableproduct->image = $filename; }
            }
            $editableproduct->save();
            return redirect('/admin/view_products')->with('flash_message_error','Product Updated successfully!');  

        }

        $level = Category::where(['parentId'=> 0])->get();
        $sublevel = Category::where ('parentId','>',0)->get();
        return view('/admin/products/edit_product')->with(compact('editableproduct','level','sublevel'));

    }

    public function deleteproduct($id = null){
        $product = Product::where(['id'=>$id])->first();
        $product->delete();
        return redirect('/admin/view_products');


    }

    public function addAttribute(request $request,$id = null){
        $product = Product::with('attributes')->where(['id'=>$id])->first();
        if ($request->isMethod('post')){
            $data = $request->all();
            
            foreach($data['sku'] as $key => $val){
            
                if (!empty($val)){
                $attr = new ProductAttributes;
            $attr->productid = $id;
            $attr->sku =$val;
            $attr->stock = $data['stock'][$key];
            $attr->price = $data['price'][$key];
            $attr->size = $data['size'][$key];
            $attr->save();
            }
        }
        return redirect('/admin/view_products');
        }
        
        return view('/admin/products/add_attributes')->with(compact('product'));
    }

    public function deleteAttribute($id=null){
        $attr = ProductAttributes::where(['id'=>$id])->first();
        $attr->delete();
        return redirect('admin/view_products')->with('flash_message_error','Attribute deleted!');


    }

    public function showProducts($id = null){
        if(!empty($id)){
            $products = Product::where(['categoryId'=>$id])->get();
            $categories = Category::where(['parentId'=>0])->get();
        $subcategories = Category::where('parentId','>',0)->get();
        $categoryname = Category::where(['id'=>$products[0]->categoryId])->first();
        return view('/frontView/products')->with(compact('categories','subcategories','products','categoryname'));
        }
        else{
        $products = Product::all();
        $categories = Category::where(['parentId' => 0])->get();
        $subcategories = Category::where('parentId','>',0)->get();
        $categoryname="All Products";
        return view('/frontView/products')->with(compact('categories','subcategories','products','categoryname'));
        }
        
        
    }
    public function showProductDetail($id = null){
        $product = Product::where(['id'=> $id])->first();
        $allproducts= Product::all();
        $categories = Category::where(['parentId'=>0])->get();
        $subcategories = Category::where('parentId','>',0)->get();
        return view('/frontView/productDetail')->with(compact('product','categories','subcategories','allproducts'));

    }
}
