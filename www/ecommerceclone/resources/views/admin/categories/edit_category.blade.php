@extends('layouts/adminLayout/admin_design')
@section('contents')
<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                </i> Home</a><a href="/admin/settings" class="current">Settings</a><a href="/admin/add_category" class="current">Category</a><a href="/admin/edit_category" class="current">Edit Category</a></div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Category</h5>
              </div>
              <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="/admin/editvalue/{{$editableCategory->id}}" name="add_category_validate" id="add_category_validate" novalidate="novalidate">{{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">New Category Name</label>
                        <div class="controls">
                          <input type="text" name="categoryname" id="categoryname" value="{{$editableCategory->name}}" />
                          <span id="chkpwd"></span>
                        </div>
                      </div>
                      <div class="control-group" id="displayer">
                        <label class="control-label">Category Level</label>
                        <div class="controls">
                          <select name="parentId" style="width: 220px;">
                            <option value="0">Main Category</option>
                          @foreach($level as $value)
                          <option value="{{$value->id}}">{{$value->name}}</option>
                          @endforeach
                          </select>
                        </div>
                        </div>
                    <div class="control-group">
                    <label class="control-label">New Description</label>
                    <div class="controls">
                      <textarea type="textarea" name="description" id="description" >{{$editableCategory->description}}</textarea> 
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">New URL</label>
                    <div class="controls">
                      <input type="text" name="url" id="url" placeholder="e.g http://example.com" value="{{$editableCategory->url}}" />
                    </div>
                  </div>
                  <div class="form-actions">
                    <input type="submit" value="Edit" class="btn btn-success">
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