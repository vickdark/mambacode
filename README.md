# Mamba Code

Portafolio personal y sitio web profesional construido con Laravel.

## Configuración

### Base de Datos

**Este proyecto NO utiliza base de datos.** Toda la funcionalidad se maneja sin persistencia de datos.

Para evitar errores relacionados con la base de datos, asegúrate de tener la siguiente configuración en tu archivo `.env`:

```env
# Comentar o eliminar la conexión de base de datos
# DB_CONNECTION=sqlite

# Usar almacenamiento basado en archivos para sesiones
SESSION_DRIVER=file

# Usar sincronización directa para colas (sin base de datos)
QUEUE_CONNECTION=sync

# Usar almacenamiento en archivos para caché
CACHE_STORE=file
```

Después de modificar el `.env`, limpia la caché de configuración:

```bash
php artisan config:clear
```

## Limpieza del Proyecto

Tailwind CSS fue removido del proyecto:

```bash
npm uninstall tailwindcss @tailwindcss/vite
```

## Dependencias Frontend

- @fontsource/inter@^5.1.0 
- @fortawesome/fontawesome-free@^6.5.0 
- alpinejs@^3.14.0 
- animate.css@^4.1.1 
- bootstrap@^5.3.3 
- sweetalert2@^11.14.0 
- swiper@^11.1.0

## Arquitectura del Frontend

### 📁 Estructura de `resources/`

La carpeta `resources/` contiene todo el código fuente del frontend antes de ser compilado por Vite:

```
resources/
├── css/                    # Estilos CSS
│   ├── app.css            # Archivo principal (imports y estilos globales)
│   └── pages/
│       └── landing.css    # Estilos específicos de la landing page
├── js/                     # JavaScript
│   ├── app.js             # Archivo principal (inicialización de librerías)
│   ├── bootstrap.js       # Configuración de Axios y otros
│   └── pages/
│       └── landing.js     # Scripts específicos de la landing page
└── views/                  # Plantillas Blade
    ├── layouts/
    │   └── landing.blade.php       # Layout base con SEO y meta tags
    ├── components/
    │   └── landing/               # Componentes reutilizables
    │       ├── navigation.blade.php
    │       ├── hero.blade.php
    │       ├── stats.blade.php
    │       ├── features.blade.php
    │       ├── pricing.blade.php
    │       ├── testimonials.blade.php
    │       ├── cta.blade.php
    │       └── footer.blade.php
    └── welcome.blade.php          # Página principal
```

### 🎨 CSS (`resources/css/app.css`)

El archivo principal importa todas las dependencias y define variables globales:

```css
@import "bootstrap/dist/css/bootstrap.min.css";
@import "@fortawesome/fontawesome-free/css/all.min.css";
@import "animate.css/animate.min.css";
@import "@fontsource/inter/index.css";

:root {
    --brand: #c05a1e;
    --content-bg: #f5f7fb;
    --border-color: #e2e8f0;
}
```

### ⚙️ JavaScript (`resources/js/app.js`)

Inicializa y configura todas las librerías JavaScript:

```javascript
import './bootstrap';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

// Hacer disponibles globalmente
window.Alpine = Alpine;
window.Swal = Swal;

// Inicializar Alpine.js
Alpine.start();
```

### 🖼️ Blade Components

El proyecto utiliza una arquitectura modular basada en componentes:

#### **Layout Base** (`layouts/landing.blade.php`)

Proporciona:
- ✅ Estructura HTML5 completa
- ✅ Meta tags para SEO
- ✅ Open Graph para redes sociales
- ✅ Schema.org para Google
- ✅ Carga de assets vía `@vite`

#### **Página Principal** (`welcome.blade.php`)

Ensambla todos los componentes:

```blade
@extends('layouts.landing')

@section('content')
    <x-landing.navigation />
    <x-landing.hero />
    <x-landing.stats />
    <x-landing.features />
    <x-landing.pricing />
    <x-landing.testimonials />
    <x-landing.cta />
    <x-landing.footer />
@endsection
```

#### **Componentes** (`components/landing/`)

Cada sección de la landing page es un componente independiente y reutilizable:

- **navigation.blade.php** - Barra de navegación con logo y menú
- **hero.blade.php** - Sección principal con título y CTA
- **stats.blade.php** - Estadísticas y métricas
- **features.blade.php** - Características del servicio
- **pricing.blade.php** - Planes y precios
- **testimonials.blade.php** - Testimonios de clientes
- **cta.blade.php** - Call to action final
- **footer.blade.php** - Pie de página con enlaces

### 🛠️ Compilación con Vite

Vite compila y optimiza todos los assets:

```blade
@vite([
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/css/pages/landing.css',
    'resources/js/pages/landing.js'
])
```

**Proceso:**
1. Vite lee los archivos de `resources/`
2. Los compila, optimiza y minifica
3. Los coloca en `public/build/`
4. Laravel los sirve al navegador

### 🔄 Flujo de Renderizado

```
Usuario visita la página
    ↓
routes/web.php → Ruta '/'
    ↓
welcome.blade.php
    ↓
Extiende layouts/landing.blade.php
    ↓
Renderiza componentes <x-landing.*>
    ↓
Vite inyecta CSS y JS compilados
    ↓
Página completa en el navegador
```

### ✨ Ventajas de esta Arquitectura

- **Modular**: Cada sección es un componente independiente
- **Reutilizable**: Los componentes se pueden usar en múltiples páginas
- **Mantenible**: Fácil encontrar y editar código específico
- **SEO Optimizado**: Meta tags, Open Graph y Schema.org
- **Performance**: Vite optimiza automáticamente
- **DX (Developer Experience)**: Hot Module Replacement durante desarrollo

