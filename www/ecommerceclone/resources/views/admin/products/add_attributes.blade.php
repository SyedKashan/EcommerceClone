@extends('layouts/adminLayout/admin_design')
@section('contents')

    <div id="content">
        <div id="content-header">
                <div id="breadcrumb"> <a href="/admin/dashboard" title="Home" class="tip-bottom"><i class="icon-home">
                    </i> Home</a><a href="/admin/view_products" class="current">Products</a><a href="/admin/add_attributes" class="current">Attributes</a></div>
    
        <div class="container-fluid"><hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>Add Attributes</h5>
                  </div>
                  
                    <div class="widget-content nopadding">
                        <form   class="form-horizontal" method="post" action="{{url('/admin/addingattribute/'.$product->id)}}" name="add_product_validate" id="add_product_validate" >{{csrf_field()}}
                            <div class="control-group">
                                    <img src="{{asset('svg/backendImages/products/mediumimage/'.$product->image)}}" width="50%" >
                                   
                    </div>
                    <div class="control-group">
                                  <label class="control-label">Product Name</label>
                                  <label class="control-label"><strong>{{$product->productname}}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Code</label>
                                    <label class="control-label"><strong>{{$product->productCode}}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Product Color</label>
                                    <label class="control-label"><strong>{{$product->productColor}}</label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Add Attributes</label>
                                    <div class="field_wrapper">
                                    <div class="controls" >
                                        <input required type="text" name="sku[]" id="sku" value="" placeholder="SKU" style="width:130px"/>  <a href="javascript:void(0)" class="add_button" title="Add field" id="addbtn" name="addbtn">ADD</a> <br>
                                        <select  name="size[]" id="size" style="width:145px"><option value="Small"><strong>Small</option><option value="Medium"><strong>Medium</option><option value="Large"><strong>Large</option><option value="Xlarge"><strong>XLarge</option></select><br/>
                                        <input required type="text" name="stock[]" id="stock" value="" placeholder="Stock" style="width:130px"/><br/>
                                        <input required type="text" name="price[]" id="price" value="" placeholder="Price" style="width:130px"/>
                                       
                                    </div>
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
            <div class="row-fluid">
              <div class="span12">
                <div class="widget-box">
                  <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                    <h5>View Attributes</h5>
                  </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>Attribute ID</th>
                          <th>SKU</th>
                          <th>Size</th>
                          <th>Price</th>
                          <th>Stock</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($product['attributes'] as $Product)
                        <tr class="gradeX">
                          <td>{{$Product->id}}</td>
                          <td>{{$Product->sku}}</td>
                          <td>{{$Product->size}}</td>
                          <td>{{$Product->price}}</td>
                          <td>{{$Product->stock}}</td>
                          <td>
                          <a href="javascript:" class="btn btn-danger btn-mini deleteRecord" style="width:40px" id="delattribute" rel="{{$Product->id}}" rel1="deleteattribute">Delete</a>
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