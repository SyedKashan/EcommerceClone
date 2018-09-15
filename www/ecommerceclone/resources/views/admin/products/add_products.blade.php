@extends('layouts/adminLayout/admin_design')
@section('contents')

<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                </i> Home</a><a href="/admin/add_products" class="current">Products</a></div>

    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Add Product</h5>
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="#" name="add_category_validate" id="add_category_validate" novalidate="novalidate">{{csrf_field()}}
                        <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                        <input type="text" name="productname" style="width: 220px;" id="productname" />
                        </div>
                        </div>
                         <div class="control-group" >
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                          <select name="parentId" style="width: 235px;">
                          @foreach($level as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                          </select>
                        </div>
                        </div>
                        <div class="control-group" >
                            <label class="control-label">Sub Category Name</label>
                            <div class="controls">
                              <select name="sublevelId" style="width: 235px;">
                              @foreach($sublevel as $value1)
                        
                              <option value="{{$value1->id}}">{{$value1->name}}</option>
                              @endforeach
                              </select>
                            </div>
                            </div>
                        <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
                        <textarea name="description" id="description" style="width: 220px;" ></textarea>
                        </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">URL</label>
                        <div class="controls">
                        <input type="text" name="url" id="url" style="width: 220px;" placeholder="e.g http://example.com" />
                        </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">File upload input</label>
                            <div class="controls">
                              <input type="file" />
                            </div>
                          </div>
                        <div class="control-group">
                        <label class="control-label">Price</label>
                        <div class="controls">
                        <input type="text" name="price" id="price" style="width: 220px;" />
                        </div>
                        </div>
                        
                        <div class="form-actions">
                        <input type="submit" value="Add" class="btn btn-success">
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