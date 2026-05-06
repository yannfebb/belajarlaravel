<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/logoblog.jpg') }}" class="img-circle elevation-2" alt="Logo Blog" style="width: 45px; height: 45px; object-fit: cover;">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name ?? 'User' }}</a>
                <small style="color: #b8c5d6; font-size: 11px;">{{ auth()->user()->email ?? 'user@example.com' }}</small>
            </div>
        </div>
    <!-- Sidebar -->
    
        <!-- Sidebar user panel (optional) -->
        

        <!-- Logout Button -->
        <div class="pb-3 px-3">
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger w-100">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <li class="nav-item menu-open">
            <a href="{{ route('blog.index') }}" class="nav-link active">
                <i class="bi bi bi-substack"></i>
                <p>
                    BLOG
                </p>
            </a>
        </li>
        </li>
    </ul>
</nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>