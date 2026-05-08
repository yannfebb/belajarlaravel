 <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">
          <i class="fas fa-home"></i> Home
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('blog.index') }}" class="nav-link">
          <i class="fas fa-blog"></i> Blog
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- User Account -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" title="Account">
          <i class="fas fa-user-circle"></i> {{ auth()->user()->name ?? 'User' }}
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <i class="fas fa-user"></i> My Profile
          </a>
          <a href="#" class="dropdown-item">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
            @csrf
            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to logout?')">
              <i class="fas fa-sign-out-alt"></i> Logout
            </button>
          </form>
        </div>
      </li>
    </ul>
</nav>
      