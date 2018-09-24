@extends('layouts/adminLayout/admin_design')
@section('contents')

<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                </i> Home</a><a href="/admin/categories/add_category" class="current">Category</a> </div>

    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Add Category</h5>
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" action="{{url('/admin/add')}}" name="add_category_validate" id="add_category_validate" novalidate="novalidate">{{csrf_field()}}
                        <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                        <input type="text" name="categoryname" id="categoryname" />
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
                        <label class="control-label">Description</label>
                        <div class="controls">
                        <textarea name="description" id="description"></textarea>
                        </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label">URL</label>
                        <div class="controls">
                        <input pattern="https?://.+" type="text" name="url" id="url" placeholder="e.g http://example.com" />
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