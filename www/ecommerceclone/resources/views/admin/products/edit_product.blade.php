@extends('layouts/adminLayout/admin_design')
@section('contents')
<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                </i> Home</a><a href="/admin/add_products" class="current">Products</a><a href="/admin/view_products" class="current">View Products</a><a href="/admin/edit_products" class="current">Edit Products</a></div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Product</h5>
              </div>
              <div class="widget-content nopadding">
              <form enctype="multipart/form-data" class="form-horizontal" method="post" action="/admin/editvalue/{{$editableproduct->id}}" name="add_category_validate" id="add_category_validate" novalidate="novalidate">{{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">New Product Name</label>
                        <div class="controls">
                          <input type="text" name="product" id="product" value="{{$editableproduct->productname}}" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Select Category</label>
                          <div class="controls"  style="width: 260px;"> 
                            <select name="parentId" id="parentId">
                            @foreach($level as $val)
                            <option value="{{$val->id}}" disabled>{{$val->name}}
                            @foreach($sublevel as $subval)
                            @if($subval->parentId == $val->id)
                            <option value="{{$subval->id}}">**{{$subval->name}}</option>
                            @endif
                            @endforeach
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    <div class="control-group">
                    <label class="control-label">New Description</label>
                    <div class="controls">
                      <textarea type="textarea" name="description" id="description" >{{$editableproduct->description}}</textarea> 
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">New URL</label>
                    <div class="controls">
                      <input pattern="https?://.+" type="text" name="url" id="url" placeholder="e.g http://example.com" value="{{$editableproduct->url}}" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">New Product Code</label>
                    <div class="controls">
                    <input type="text" name="code" id="code" style="width: 220px;" value="{{$editableproduct->productCode}}" />
                    </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">New Product Color</label>
                        <div class="controls">
                        <input type="text" name="color" id="color" style="width: 220px;" value="{{$editableproduct->productColor}}" />
                        </div>
                        </div>
              <div class="control-group">
              <label class="control-label">New Price</label>
              <div class="controls">
              <input type="text" name="price" id="price" style="width: 220px;" value="{{$editableproduct->price}}" />
              </div>
              </div>
              <div class="control-group">
                  <label class="control-label">File upload</label>
                  <div class="controls">
                    <div class="uploader" id="uniform-undefined">
                      <input type="file" name="image" id="image" size="19" style="opacity: 0 !important;">
                      <span class="filename">No file selected</span>
                      <span class="action">Choose File</span></div>
                      @if($editableproduct->image != "")
                      <img src="{{asset('svg/backendImages/products/smallimage/'.$editableproduct->image)}}" width="40px" />
                      <a href="/deleteimage/{{$editableproduct->id}}">Delete</a>
                      @endif
                    </div>
                </div>
                  <div class="form-actions">
                    <input type="submit" id="update" value="Update" class="btn btn-success">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection