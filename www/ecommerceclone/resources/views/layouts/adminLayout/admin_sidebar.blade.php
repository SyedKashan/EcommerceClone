<div id="sidebar"><a href="{{url('/admin/dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/add_category')}}">Add Category</a></li>
        <li><a href="/admin/view_category">View Category</a></li>
        
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{url('/admin/add_product')}}">Add Products</a></li>
        <li><a href="{{url('/admin/view_products')}}">View Product</a></li>
        
      </ul>
    </li>
</div>
<!--sidebar-menu-->