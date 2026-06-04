<div class="container-fluid border-bottom bg-light wow fadeIn sticky-top">
    <div class="container topbar bg-primary d-none d-lg-block py-2" style="border-radius: 0 40px">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3">
                    <i class="fas fa-map-marker-alt me-2 text-white"></i> 
                    <a href="https://pddikti.kemdiktisaintek.go.id/detail-pt/-rXvV_0Hkn-6GhTYKm7jnq-8If7jfoDS6o5ElQnP4tysLQvouACgLXmGdZiSh-lPWCUr3g%3D%3D" class="text-white">Polbel</a>
                </small>
                <small class="me-3">
                    <i class="fas fa-envelope me-2 text-white"></i>
                    <a href="mailto:Email@Example.com" class="text-white">Email@Example.com</a>
                </small>
            </div>
            <div class="top-link pe-2">
                <a href="https://facebook.com/share/1HqLFdqPzx/" class="btn btn-light btn-sm-square rounded-circle">
                    <i class="fab fa-facebook-f text-primary"></i>
                </a>
                <a href="https://instagram.com/yannfebb26" class="btn btn-light btn-sm-square rounded-circle">
                    <i class="fab fa-instagram text-primary"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <nav class="navbar navbar-light navbar-expand-xl py-3">
            <a href="/" class="navbar-brand">
                <h1 class="text-primary display-6">Cyberbrain</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About</a>
                    <a href="/blog" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">Our Blog</a>
                    <a href="/dev" class="nav-link {{ request()->is('dev') ? 'active' : '' }}">Developer</a>
                    <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">Admin Page</a>
                    <a href="/test" class="nav-link {{ request()->is('test') ? 'active' : '' }}">test</a>
                </div>
            </div>        
        </nav>
    </div> 
</div>