<!-- Navigation -->
<nav class="landing-nav animate__animated animate__fadeInDown">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Mobile Menu Toggle (Left on mobile) -->
        <button class="mobile-menu-toggle d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Logo -->
        <a href="#inicio" class="d-flex align-items-center gap-3 navbar-logo-container text-decoration-none">
            <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code Logo - Consultoría y Software" class="landing-logo">
            <span class="fs-4 fw-bold d-none d-md-block text-white">Mamba<span style="color: var(--mamba-secondary)">Code</span></span>
        </a>
        
        <!-- Desktop Navigation (Hidden on mobile) -->
        <div class="nav-links d-none d-md-flex">
            <a href="#inicio" class="nav-link-item active" title="Volver al inicio">Inicio</a>
            <a href="#caracteristicas" class="nav-link-item" title="Conoce nuestras características tecnológicas">Características</a>
            <a href="#precios" class="nav-link-item" title="Ver planes y licencias">Precios</a>
            <a href="#testimonios" class="nav-link-item" title="Qué opinan nuestros clientes">Testimonios</a>
            <a href="#contacto" class="nav-link-item" title="Ponte en contacto con nuestro equipo técnico">Contacto</a>
            <a href="#" class="nav-link-item" title="Acceso Administrativo">
                <i class="fa-solid fa-fingerprint"></i>
            </a>
        </div>
    </div>
</nav>

<!-- Mobile Navigation Sidebar (Bootstrap Offcanvas) -->
<div class="offcanvas offcanvas-start mobile-sidebar d-md-none" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
    <div class="offcanvas-header border-bottom">
        <div class="d-flex align-items-center gap-2" id="mobileSidebarLabel">
            <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code" style="height: 30px; border-radius: 4px;">
            <span class="fw-bold">Mamba<span style="color: var(--mamba-secondary)">Code</span></span>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="nav flex-column">
            <a href="#inicio" class="nav-link-item mb-3">
                <i class="fa-solid fa-home me-2"></i> Inicio
            </a>
            <a href="#caracteristicas" class="nav-link-item mb-3">
                <i class="fa-solid fa-star me-2"></i> Características
            </a>
            <a href="#precios" class="nav-link-item mb-3">
                <i class="fa-solid fa-tag me-2"></i> Precios
            </a>
            <a href="#testimonios" class="nav-link-item mb-3">
                <i class="fa-solid fa-comments me-2"></i> Testimonios
            </a>
            <a href="#contacto" class="nav-link-item mb-3">
                <i class="fa-solid fa-envelope me-2"></i> Contacto
            </a>
            <div class="dropdown-divider my-2 opacity-10"></div>
            <a href="#" class="nav-link-item">
                <i class="fa-solid fa-fingerprint me-2"></i> Acceso Admin
            </a>
        </div>
    </div>
</div>
