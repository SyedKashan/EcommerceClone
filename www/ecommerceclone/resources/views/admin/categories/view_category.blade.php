@extends('layouts/adminLayout/admin_design')
@section('contents')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="/admin/settings" class="current">Settings</a><a href="/admin/add_category" class="current">Category</a>  <a href="/admin/view_category" class="current">Tables</a> </div>
    @if(Session::has('flash_message_error'))
 <div class="alert alert-success alert-dismissable" role="alert">
        <a href="/admin/view_category" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('flash_message_error')}}</strong>
 </div>
                @endif     
     
    <h1>Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Category table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category Name</th>
                  <th>URL</th>
                  <th>Description</th>
                  <th>Parent Category</th>
                  <th>Date of Creation</th>
                  <th>Last Updated at</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              	@foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{$category->id}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->url}}</td>
                  <td>{{$category->description}}</td>
                  <td>
                    @foreach($parents as $parent)
                    @if($category->parentId == $parent->id)
                    {{$parent->name}}
                    @endif
                    @endforeach
                    @if($category->parentId == 0)
                    Main Category
                    @endif
                  </td>
                  <td>{{$category->created_at}}</td>
                  <td>{{$category->updated_at}}</td>
                  <td><a href="/admin/edit_category/{{$category->id}}" class="btn btn-primary btn-mini">Edit</a><a href="/admin/deletecategory/{{$category->id}}" class="btn btn-danger btn-mini">Delete</a></td>
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