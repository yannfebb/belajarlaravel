<div class="container-fluid topbar bg-dark-custom d-none d-lg-block py-3 px-lg-5 fixed-top">
    <div class="d-flex justify-content-between align-items-center">

        <!-- Hapus tag double, langsung pasang class navbar-brand-custom di sini -->
        <a href="https://www.instagram.com/yannfebb26?igsh=M3gyc2t6cWsyaXBk" class="navbar-brand-custom instagram-link">YannFebb</a>

        <div class="top-info">
            <div class="navbar-nav-custom">
                <a href="/" class="nav-item-custom {{ request()->is('/') ? 'active' : '' }}">Home</a>
                <a href="/blog" class="nav-item-custom {{ request()->is('blog') ? 'active' : '' }}">Articles</a>
                <a href="/about" class="nav-item-custom {{ request()->is('about') ? 'active' : '' }}">About</a>
                <a href="/contact" class="nav-item-custom {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
            </div>
        </div>
    </div>
</div>
