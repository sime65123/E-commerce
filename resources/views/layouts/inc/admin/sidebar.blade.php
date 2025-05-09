<nav class="sidebar sidebar-offcanvas fw-bold" id="sidebar" style="font-family: 'Tahoma', Geneva, Verdana, sans-serif">
    <ul class="nav">
      <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/dashboard') }}">
          <i class="mdi mdi-power menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/orders') }}">
          <i class="mdi mdi-shopping menu-icon"></i>
          <span class="menu-title">Orders</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/category') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#category" aria-expanded="{{ Request::is('admin/category') ? 'true':'false' }}">
          <i class="mdi mdi-server menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/category') ? 'show':'' }}" id="category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}" href="{{ url('admin/category/create') }}">Add Category</a></li>
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}" href="{{ url('admin/category') }}">All Category</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('admin/products') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#products" aria-expanded="{{ Request::is('admin/products') ? 'true':'false' }}">
          <i class="mdi mdi-square-inc-cash menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/products') ? 'show':'' }}" id="products">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Add Product</a></li>
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}" href="{{ url('admin/products') }}">All Products</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/brands') }}">
          <i class="mdi mdi-format-align-justify menu-icon"></i>
          <span class="menu-title">Brands</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/colors') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/colors') }}">
          <i class="mdi mdi-format-align-justify menu-icon"></i>
          <span class="menu-title">Colors</span>
        </a>
      </li>
      <li class="nav-item {{ Request::is('admin/users') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#users" aria-expanded="{{ Request::is('admin/users') ? 'true':'false' }}" aria-controls="ui-basic">
          <i class="mdi mdi-worker menu-icon"></i>
          <span class="menu-title">Users</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/users') ? 'show':'' }}" id="users">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/users/create') ? 'active':'' }}" href="{{ url('admin/users/create') }}">Add User</a></li>
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active':'' }}" href="{{ url('admin/users') }}">All Users</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
        <a class="nav-link" data-bs-toggle="collapse" href="#sliders" aria-expanded="{{ Request::is('admin/sliders') ? 'true':'false' }}" aria-controls="ui-basic">
          <i class="mdi mdi-worker menu-icon"></i>
          <span class="menu-title">Home Slider</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse {{ Request::is('admin/sliders') ? 'show':'' }}" id="sliders">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/sliders/create') ? 'active':'' }}" href="{{ url('admin/sliders/create') }}">Add Slider</a></li>
            <li class="nav-item"> <a class="nav-link {{ Request::is('admin/sliders') || Request::is('admin/sliders/*/edit') ? 'active':'' }}" href="{{ url('admin/sliders') }}">All Sliders</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
        <a class="nav-link" href="{{ url('admin/settings') }}">
            <i class="mdi mdi-settings menu-icon"></i>
          <span class="menu-title">Site Setting</span>
        </a>
      </li>

    </ul>
  </nav>
