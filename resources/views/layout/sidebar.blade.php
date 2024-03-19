<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile not-navigation-link" style="display: none;">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="{{ url('assets/images/faces/face8.jpg') }}" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name">Richard V.Welsh</p>
            <div class="dropdown" data-display="static">
              <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <small class="designation text-muted">Manager</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                <a class="dropdown-item mt-2"> Manage Accounts </a>
                <a class="dropdown-item"> Change Password </a>
                <a class="dropdown-item"> Check Inbox </a>
                <a class="dropdown-item"> Sign Out </a>
              </div>
            </div>
          </div>
        </div>
        <button class="btn btn-success btn-block">New Project <i class="mdi mdi-plus"></i>
        </button>
      </div>
    </li>

    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <img src="{{ url('assets/images/sidenav/dashboard.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Dashboard</span>
      </a>
    </li>
    <!-- Admin -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#adminSubMenu" aria-expanded="false" aria-controls="adminSubMenu">
        <img src="{{ url('assets/images/sidenav/protection.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Admin</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['category']) }}" href="{{ route('admin.category') }}">
          <img src="{{ url('assets/images/sidenav/application.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Category</span>
        </a>
      </div>
      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['brand']) }}" href="{{ route('admin.brand') }}">
          <img src="{{ url('assets/images/sidenav/C.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Brand</span>
        </a>
      </div>
      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['description']) }}" href="{{ route('admin.description') }}">
          <img src="{{ url('assets/images/sidenav/job-description.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Description</span>
        </a>
      </div>
      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['seregistration']) }}" href="{{ route('admin.seregistration') }}">
          <img src="{{ url('assets/images/sidenav/website.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">SE Registration</span>
        </a>
      </div>
      <div class="collapse" id="adminSubMenu">
        <a class="nav-link {{ active_class(['supplier']) }}" href="{{ route('admin.supplier') }}">
          <img src="{{ url('assets/images/sidenav/supplier.png') }}" alt="profile image" style="margin-right: 10px;">
          <span class="menu-title">Supplier</span>
        </a>
      </div>
    </li>
    <!-- Admin -->
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <img src="{{ url('assets/images/sidenav/shopping-cart.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Purchase</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <img src="{{ url('assets/images/sidenav/graph.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Sales</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <img src="{{ url('assets/images/sidenav/in-stock.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Stock</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
      <img src="{{ url('assets/images/sidenav/profile.png') }}" alt="profile image" style="margin-right: 10px;">
      <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Accounts</span>
    </a>
  </li>
  <li class="nav-item {{ active_class(['/']) }}">
    <a class="nav-link" href="{{ url('/') }}">
      <img src="{{ url('assets/images/sidenav/cash-payment.png') }}" alt="profile image" style="margin-right: 10px;">
      <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Payment</span>
    </a>
    </li>
    <li class="nav-item {{ active_class(['/']) }}">
      <a class="nav-link" href="{{ url('/') }}">
        <img src="{{ url('assets/images/sidenav/report.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Report</span>
      </a>
    </li>
    
    <li class="nav-item {{ active_class(['charts/chartjs']) }}">
      <a class="nav-link" href="{{ url('/charts/chartjs') }}">
        <img src="{{ url('assets/images/sidenav/pie-chart.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Charts</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['tables/basic-table']) }}">
      <a class="nav-link" href="{{ url('/tables/basic-table') }}">
        <img src="{{ url('assets/images/sidenav/frequency.png') }}" alt="profile image" style="margin-right: 10px;">
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Tables</span>
      </a>
    </li>

    <!-- No Need -->
    <li class="nav-item {{ active_class(['icons/material']) }}">
      <a class="nav-link" href="{{ url('/icons/material') }}">
        <i class="menu-icon mdi mdi-emoticon"></i>
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">Icons</span>
      </a>
    </li>
    <li class="nav-item {{ active_class(['user-pages/*']) }}">
      <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-expanded="{{ is_active_route(['user-pages/*']) }}" aria-controls="user-pages">
        <i class="menu-icon mdi mdi-lock-outline"></i>
        <span class="menu-title" style="color: #1e3d59;font-size: 103%;font-family: sans-serif;font-weight: bold;">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse {{ show_class(['user-pages/*']) }}" id="user-pages">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item {{ active_class(['user-pages/login']) }}">
            <a class="nav-link" href="{{ url('/user-pages/login') }}">Login</a>
          </li>
          <li class="nav-item {{ active_class(['user-pages/register']) }}">
            <a class="nav-link" href="{{ url('/user-pages/register') }}">Register</a>
          </li>
          <li class="nav-item {{ active_class(['user-pages/lock-screen']) }}">
            <a class="nav-link" href="{{ url('/user-pages/lock-screen') }}">Lock Screen</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>