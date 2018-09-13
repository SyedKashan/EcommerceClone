@extends('layouts/adminLayout/admin_design')
@section('contents')
<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                </i> Home</a><a href="/admin/settings" class="current">Settings</a><a href="/admin/categories/add_category" class="current">Category</a> </div>
                <h1>Category</h1> </div>
                @if(Session::has('flash_message_error'))
    <div class="alert alert-success alert-dismissable" role="alert">
           <a href="/admin/add_category" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>{{session('flash_message_error')}}</strong>
    </div>
    @endif
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
                    <div class="control-group">
                    <label class="control-label">Description</label>
                    <div class="controls">
                      <input type="text" name="description" id="description" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">URL</label>
                    <div class="controls">
                      <input type="text" name="url" id="url" placeholder="Enter like this http://example.com" />
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