<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.dashboard') }}" class="brand-link">
    <span class="brand-text font-weight-light">Admin Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

        <li class="nav-item">
          <a href="{{ route('admin.dashboard') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.categories.index') }}" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>Categories</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.packages.index') }}" class="nav-link">
            <i class="nav-icon fas fa-suitcase-rolling"></i>
            <p>Packages</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/admin/bookings') }}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>Bookings</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
