<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      @if (!is_null(Auth::guard('user')->user()->url_photo) && file_exists(public_path(Auth::guard('user')->user()->url_photo))) 
        <img alt="image" src="{{ asset(Auth::guard('user')->user()->url_photo) }}" class="rounded-circle mr-1"> 
      @else 
        <img alt="image" src="{{ asset('assets/img/user.png') }}" class="rounded-circle mr-1"> 
      @endif
      <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('user')->user()->teacher->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="{{ url('user/profile') }}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="{{ route('user.log_activity') }}" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Activities
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item has-icon text-danger" onclick="document.getElementById('logout').submit();">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout" action="{{ URL::to('/logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>