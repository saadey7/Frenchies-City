<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="./" class="brand-link">
    <img src="{{asset('public/Web/img/logo2.png')}}" alt="AdminLTE Logo" class="brand-image elevation-0"
      style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('public/Web/img/logo2.png')}}" class=" elevation-0" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::guard('admin')->user()->name}} <br> (Admin)</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="fas fa-home nav-icon"></i>
            <p>
              Home
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{url('admin/addBreed')}}" class="nav-link {{ (request()->is('admin/addBreed')) ? 'active' : '' }}">
                <i class="fas fa-dog nav-icon"></i>
                <p>Add/View Breed</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{route('admin.puppy')}}" class="nav-link {{ (request()->is('admin/addPuppy')) ? 'active' : '' }}">
                <i class="fas fa-dog nav-icon"></i>
                <p>Add/View Puppies</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{url('admin/article')}}" class="nav-link {{ (request()->is('admin/article')) ? 'active' : '' }}">
                <i class="fas fa-dog nav-icon"></i>
                <p>Add/View Articles</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{url('admin/orders')}}" class="nav-link {{ (request()->is('admin/orders')) ? 'active' : '' }}">
                <i class="fas fa-shopping-bag nav-icon"></i>
                <p>ToTal Orders</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="{{url('admin/about_me')}}" class="nav-link {{ (request()->is('admin/about_me')) ? 'active' : '' }}  {{ (request()->is('admin/quote_detail')) ? 'active' : '' }}">
                <i class="fas fa-quote-left nav-icon"></i>
                <p>Ask About Me Request</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
</aside>