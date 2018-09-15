@extends('layouts/adminLayout/admin_design')
@section('contents')

<div id="content">
    <div id="content-header">
            <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                </i> Home</a><a href="#" class="current">Settings</a> </div>
            <h1>Settings</h1>
    </div>
    @if(Session::has('flash_message_error'))
    <div class="alert alert-success alert-dismissable" role="alert">
           <a href="/admin" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>{{session('flash_message_error')}}</strong>
    </div>
                   @endif     
          
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Update Password</h5>
              </div>
             
              <div class="widget-content nopadding">
              <form class="form-horizontal" method="post" action="{{url("/admin/update-pwd")}}" name="password_validate" id="password_validate" novalidate="novalidate">{{csrf_field()}}
                    <div class="control-group">
                        <label class="control-label">Current Password</label>
                        <div class="controls">
                          <input type="password" name="pwd" id="pwd" />
                          <span id="chkpwd"></span>
                        </div>
                    <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password" name="pwd1" id="pwd1" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Confirm password</label>
                    <div class="controls">
                      <input type="password" name="pwd2" id="pwd2" />
                    </div>
                  </div>
                  <div class="form-actions">
                    <input type="submit" value="Update Password" class="btn btn-success">
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