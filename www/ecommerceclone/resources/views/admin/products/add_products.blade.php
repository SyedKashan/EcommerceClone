@extends('layouts/adminLayout/admin_design')
@section('contents')
<script type="text/javascript">



</script>
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
              <form enctype="multipart/form-data"  class="form-horizontal" method="post" action="{{url('/admin/addingproduct')}}" name="add_product_validate" id="add_product_validate" novalidate="novalidate">{{csrf_field()}}
                        <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                        <input type="text" name="productname" style="width: 220px;" id="productname" />
                        </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Select Category</label>
                              <div class="controls"  style="width: 260px;"> 
                                <select name="parentId" id="parentId">
                                @foreach($level as $val)
                                <option value="{{$val->id}}" disabled >{{$val->name}}
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
                        <label class="control-label">Description</label>
                        <div class="controls">
                        <textarea name="description" id="description" style="width: 220px;" ></textarea>
                        </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">URL</label>
                        <div class="controls">
                        <input pattern="https?://.+" type="text" name="url" id="url" style="width: 220px;" placeholder="e.g http://example.com" />
                        </div>
                      </div>
                          <div class="control-group">
                              <label class="control-label">Product Code</label>
                              <div class="controls">
                              <input type="text" name="code" id="price" style="width: 220px;" />
                              </div>
                              </div>
                              <div class="control-group">
                                  <label class="control-label">Product Color</label>
                                  <div class="controls">
                                  <input type="text" name="color" id="price" style="width: 220px;" />
                                  </div>
                                  </div>
                        <div class="control-group">
                        <label class="control-label">Price</label>
                        <div class="controls">
                        <input type="text" name="price" id="price" style="width: 220px;" />
                        </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">File upload</label>
                            <div class="controls">
                              <div class="uploader" id="uniform-undefined">
                                <input type="file" name="image" id="image" size="19" style="opacity: 0 !important;">
                                <span class="filename">No file selected</span>
                                <span class="action">Choose File</span></div>
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