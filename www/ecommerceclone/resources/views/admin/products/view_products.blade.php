@extends('layouts/adminLayout/admin_design')
@section('contents')
<div id="content">
  <div id="content-header">
        <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
            </i> Home</a><a href="/admin/add_products" class="current">Products</a><a href="/admin/view_products" class="current">View Products</a></div>
    @if(Session::has('flash_message_error'))
 <div class="alert alert-success alert-dismissable" role="alert">
        <a href="/admin/view_category" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('flash_message_error')}}</strong>
 </div>
@endif 
   
<h1>Products</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Product table</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>URL</th>
                <th>Description</th>
                <th>Product Category</th>
                <th>Color</th>
                <th>Image</th>
                <th>Price</th>
                <th>Date of Creation</th>
                <th>Last Updated at</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach($products as $Product)
              <tr class="gradeX">
                <td>{{$Product->id}}</td>
                <td>{{$Product->productname}}</td>
                <td>{{$Product->url}}</td>
                <td>{{$Product->description}}</td>
                @foreach($categories as $category)
                @if($category->id == $Product->subCategoryId)
              <td>{{$category->name}}</td>
                @endif
                <div id="mymodal{{$Product->id}}" class="modal hide in" aria-hidden="false" style="display:none;">
                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>{{$Product->productname}} Details</h3>
                        </div>
                        <div class="modal-body" style="height:600px">
                           
                                <img  class="img-rounded" src="{{asset('svg/backendImages/products/smallimage/'.$Product->image)}}" />
                                <div class="pull-left" style="text-align:left !important"><p><br><b>Product ID:</b> {{ $Product->id }}</p>
                                <p><b>Product Name:</b>  {{ $Product->productname }}</p>
                                <p><b>Product Description:</b> {{ $Product->description }}</p>
                                <p><b>Product Category:</b> {{$category->name}}</p>
                                <p><b>Product Price:</b> {{ $Product->price }}</p>
                                <p><b>Product Color:</b>  {{ $Product->productColor }}</p>
                                <p><b>Product URL:</b> {{ $Product->url}}</p>
                                <p><b>Product Last Updated:</b> {{ $Product->updated_at }}</p>
                            </div>
                        </div>
                      </div> 
                @endforeach
                <td>{{$Product->productColor}}</td>
                <td>
                <img src="{{asset('svg/backendImages/products/smallimage/'.$Product->image)}}" style="width:100px"/>
                </td>
                <td>{{$Product->price}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td style="width:50px">
                  <a href="/admin/add_attributes/{{$Product->id}}" class="btn btn-info btn-mini" style="width:40px">Add</a>
                  <a href="/admin/edit_product/{{$Product->id}}" class="btn btn-primary btn-mini" style="width:40px">Edit</a>
                    <a href="#mymodal{{$Product->id}}" data-toggle="modal" class="btn btn-success btn-mini" style="width:40px">View</a>
                <a href="javascript:" class="btn btn-danger btn-mini deleteRecord" style="width:40px" id="delproduct" rel="{{$Product->id}}" rel1="deleteproduct">Delete</a>
                </td>
              </tr>
              @endforeach
            
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection