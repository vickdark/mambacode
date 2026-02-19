<!-- Recent Products Section -->
<section class="products-section" id="productos">
    <div class="container mb-5 text-center">
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill mb-3">Portafolio</span>
        <h2 class="hero-title fs-1 mb-3">Productos Recientes</h2>
        <p class="text-muted mx-auto products-section-description">
            Soluciones tecnológicas desarrolladas para potenciar sectores específicos.
        </p>
    </div>

    <div class="products-container">
        <!-- Product 1: Private Transport -->
        <!-- We make the whole card clickable by wrapping content or using JS, but strictly HTML we use an anchor tag as the card container or inside -->
        <!-- Here we will use an anchor wrapper for the card to follow best UX practices or keep the button subtle inside -->
        <div class="product-card animate__animated animate__fadeInUp" style="--product-animation-delay: 0.1s;" data-route="{{ route('products.transports') }}">
            <div class="product-icon-custom">
                <i class="fa-solid fa-taxi fa-2x"></i>
            </div>
            <h3 class="product-title">Transporte Privado</h3>
            <p class="product-desc">
                Sistema de gestión integral para flotas de transporte. Control de conductores, asignación de rutas y monitoreo en tiempo real para optimizar tu logística.
            </p>
            <a href="{{ route('products.transports') }}" class="product-link">
                Explorar Solución <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>

        <!-- Product 2: Sales System -->
        <div class="product-card animate__animated animate__fadeInUp" style="--product-animation-delay: 0.2s;" data-route="{{ route('products.sales') }}">
            <div class="product-icon-custom">
                <i class="fa-solid fa-cash-register fa-2x"></i>
            </div>
            <h3 class="product-title">Sistema de Ventas</h3>
            <p class="product-desc">
                Punto de venta versátil con facturación, control de inventarios muti-almacén y reportes financieros detallados para escalar tu comercio.
            </p>
            <a href="{{ route('products.sales') }}" class="product-link">
                Conocer Más <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>

        <!-- Product 3: ITAM Management -->
        <div class="product-card animate__animated animate__fadeInUp" style="--product-animation-delay: 0.3s;" data-route="{{ route('products.itam') }}">
            <div class="product-icon-custom">
                <i class="fa-solid fa-server fa-2x"></i>
            </div>
            <h3 class="product-title">Gestión ITAM</h3>
            <p class="product-desc">
                Estrategia integral para el ciclo de vida de tus activos de TI. Inventaria, despliega, mantén y retira hardware y software maximizando el valor.
            </p>
            <a href="{{ route('products.itam') }}" class="product-link">
                Ver Detalles <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
        
         <!-- Product 4: SysGym (Coming Soon) -->
        <div class="product-card animate__animated animate__fadeInUp product-card-coming-soon" style="--product-animation-delay: 0.4s;">
            <div class="product-badge">Próximamente</div>
            <div class="product-icon-custom">
                <i class="fa-solid fa-dumbbell fa-2x"></i>
            </div>
            <h3 class="product-title">SysGym</h3>
            <p class="product-desc">
                La solución definitiva para la administración de gimnasios. Gestión de membresías, control de accesos biométrico y seguimiento de progreso de clientes.
            </p>
            <span class="product-link text-muted product-link-disabled">
                En Desarrollo <i class="fa-solid fa-hammer"></i>
            </span>
        </div>
    </div>
</section>
