<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/logoblog.jpg') }}" class="img-circle elevation-2" alt="Logo Blog" style="width: 45px; height: 45px; object-fit: cover;">
        </div>
        <div class="info">
            <a href="#" class="d-block" style="color: white; font-weight: 600;">{{ auth()->user()->name ?? 'User' }}</a>
            <small style="color: rgba(255,255,255,0.7); font-size: 11px;">{{ auth()->user()->email ?? 'user@example.com' }}</small>
        </div>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="/" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Blog Section -->
            <li class="nav-item menu-open">
                <a href="{{ route('blog.index') }}" class="nav-link active">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Blog Posts
                    </p>
                </a>
            </li>

            <!-- Create New Post -->
            <li class="nav-item">
                <a href="{{ route('blog.create') }}" class="nav-link">
                    <i class="nav-icon fas fa-plus-circle"></i>
                    <p>Create Post</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</aside>