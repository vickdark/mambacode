<!-- Navigation -->
<nav class="landing-nav animate__animated animate__fadeInDown">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Mobile Menu Toggle (Left on mobile) -->
        <button class="mobile-menu-toggle d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Logo -->
        <a href="{{ route('home') }}#inicio" class="d-flex align-items-center gap-3 navbar-logo-container text-decoration-none">
            <img src="{{ asset('img/mambacode.jpeg') }}" alt="Mamba Code Logo - Consultoría y Software" class="landing-logo">
            <span class="fs-4 fw-bold d-none d-md-block text-white">Mamba<span style="color: var(--mamba-secondary)">Code</span></span>
        </a>
        
        <!-- Desktop Navigation (Hidden on mobile) -->
        <div class="nav-links d-none d-md-flex">
            <a href="{{ route('home') }}#inicio" class="nav-link-item active" title="Volver al inicio">Inicio</a>
            <a href="{{ request()->routeIs('home') ? route('home') . '#caracteristicas' : '#features' }}" class="nav-link-item" title="{{ request()->routeIs('home') ? 'Conoce nuestros servicios' : 'Conoce nuestras funcionalidades' }}">{{ request()->routeIs('home') ? 'Servicios' : 'Funcionalidades' }}</a>
            <div class="dropdown">
                <a class="nav-link-item dropdown-toggle" href="#" role="button" id="portfolioDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Conoce nuestro portafolio">
                    Portafolio
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="portfolioDropdown">
                    <li><a class="dropdown-item" href="{{ route('products.sales') }}">Sistema de Ventas POS</a></li>
                    <li><a class="dropdown-item" href="{{ route('products.itam') }}">Gestión de Activos ITAM</a></li>
                    <li><a class="dropdown-item" href="{{ route('products.gym') }}">SysGym - Software Fitness</a></li>
                    <li><a class="dropdown-item" href="{{ route('products.transports') }}">Sistema de Transporte Privado</a></li>
                </ul>
            </div>
            @if (request()->routeIs('products.*'))
                <a href="#pricing" class="nav-link-item" title="Conoce nuestros precios">Precios</a>
            @endif
            @if (!request()->routeIs('products.*'))
                <a href="{{ route('home') }}#testimonios" class="nav-link-item" title="Qué opinan nuestros clientes">Testimonios</a>
            @endif
            <a href="{{ request()->routeIs('home') ? route('home') : '' }}#contacto" class="nav-link-item" title="Ponte en contacto con nuestro equipo técnico">Contacto</a>
            <a href="{{ env('ADMIN_LOGIN_URL') }}" target="_blank" class="nav-link-item" title="Acceso Administrativo">
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
            <a href="{{ route('home') }}#inicio" class="nav-link-item mb-3">
                <i class="fa-solid fa-home me-2"></i> Inicio
            </a>
            <a href="{{ request()->routeIs('home') ? route('home') . '#caracteristicas' : '#features' }}" class="nav-link-item mb-3">
                <i class="fa-solid fa-star me-2"></i> {{ request()->routeIs('home') ? 'Servicios' : 'Funcionalidades' }}
            </a>
            <li class="nav-item mb-3">
                    <a class="nav-link-item d-flex align-items-center text-decoration-none text-white" data-bs-toggle="collapse" href="#portfolioMobileCollapse" role="button" aria-expanded="false" aria-controls="portfolioMobileCollapse">
                        <i class="fa-solid fa-briefcase me-2"></i> Portafolio <i class="fa-solid fa-chevron-down ms-auto"></i>
                    </a>
                    <div class="collapse mt-2" id="portfolioMobileCollapse">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a class="nav-link text-white py-1" href="{{ route('products.sales') }}"><i class="fa-regular fa-circle me-2"></i> Sistema de Ventas POS</a></li>
                            <li class="nav-item"><a class="nav-link text-white py-1" href="{{ route('products.itam') }}"><i class="fa-regular fa-circle me-2"></i> Gestión de Activos ITAM</a></li>
                            <li class="nav-item"><a class="nav-link text-white py-1" href="{{ route('products.gym') }}"><i class="fa-regular fa-circle me-2"></i> SysGym - Software Fitness</a></li>
                            <li class="nav-item"><a class="nav-link text-white py-1" href="{{ route('products.transports') }}"><i class="fa-regular fa-circle me-2"></i> Sistema de Transporte Privado</a></li>
                        </ul>
                    </div>
                </li>
            @if (request()->routeIs('products.*'))
                <a href="#pricing" class="nav-link-item mb-3">
                    <i class="fa-solid fa-tag me-2"></i> Precios
                </a>
            @endif
            @if (!request()->routeIs('products.*'))
                <a href="{{ route('home') }}#testimonios" class="nav-link-item mb-3">
                    <i class="fa-solid fa-comments me-2"></i> Testimonios
                </a>
            @endif
            <a href="{{ request()->routeIs('home') ? route('home') : '' }}#contacto" class="nav-link-item mb-3">
                <i class="fa-solid fa-envelope me-2"></i> Contacto
            </a>
            <div class="dropdown-divider my-2 opacity-10"></div>
            <a href="{{ env('ADMIN_LOGIN_URL') }}" target="_blank" class="nav-link-item">
                <i class="fa-solid fa-fingerprint me-2"></i> Acceso Admin
            </a>
        </div>
    </div>
</div>
