# Mamba Code

Portafolio empresarial y sitio web profesional construido con Laravel.

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
│   ├── app.css            # Archivo global (imports módulos)
│   ├── app/               # 🆕 Módulos de la aplicación principal
│   │   ├── _variables.css
│   │   ├── _base.css
│   │   ├── _footer.css
│   │   └── _utilities.css
│   └── pages/
│       └── landing/       # 🆕 Arquitectura modular para landing
│           ├── index.css           # Punto de entrada (imports)
│           ├── _variables.css
│           ├── _scrollbar.css
│           ├── _background.css
│           ├── _navbar.css
│           ├── _hero.css
│           ├── _features.css
│           └── ... (otros módulos)
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
    └── welcome.blade.php          # Página principal
```

### 🎨 CSS Modular


#### **Arquitectura de Estilos**

Tanto la aplicación principal como la landing page utilizan una **arquitectura modular** donde los estilos se dividen en archivos pequeños y enfocados.

#### **1. Landing Page (`resources/css/pages/landing/`)**

**`index.css`** - Punto de entrada que importa los módulos:

```css
/* Base & Variables */
@import './_variables.css';

/* Components */
@import './_navbar.css';
@import './_hero.css';
/* ... otros módulos */
```

| Archivo | Propósito |
|---------|-----------|
| `_variables.css` | Variables CSS base (colores, fuentes) |
| `_background.css` | Fondo animado con gradientes |
| `_navbar.css` | Navegación responsive |
| `_hero.css` | Sección principal con animaciones |
| `_features.css` | Cards con efectos 3D |
| ... | Otros componentes específicos |

#### **2. Aplicación Global (`resources/css/app/`)**

**`app.css`** - Archivo principal que integra librerías y módulos globales:

```css
/* Libraries */
@import "bootstrap/dist/css/bootstrap.min.css";
/* ... otras librerías */

/* App Modules */
@import "./app/_variables.css";
@import "./app/_base.css";
@import "./app/_footer.css";
@import "./app/_utilities.css";
```

| Archivo | Propósito |
|---------|-----------|
| `_variables.css` | Variables globales de la app |
| `_base.css` | Estilos base para html y body |
| `_footer.css` | Estilos del pie de página global |
| `_utilities.css` | Clases de utilidad y overrides |

**Ventajas de la Arquitectura Modular:**
- ✅ **Separación de responsabilidades**: Cada módulo maneja una sección específica
- ✅ **Fácil mantenimiento**: Encuentra y edita estilos rápidamente
- ✅ **Escalabilidad**: Agrega nuevos módulos sin tocar código existente
- ✅ **Colaboración**: Múltiples desarrolladores pueden trabajar sin conflictos
- ✅ **Reutilización**: Importa solo los módulos que necesites

### ⚙️ JavaScript Modular

#### **1. Aplicación Principal (`resources/js/app.js`)**

Inicializa las librerías base (Alpine.js, Bootstrap, SweetAlert2):

```javascript
import './bootstrap';
import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';
// ... configuración global
```

#### **2. Landing Page (`resources/js/pages/landing/`)**

El script de la landing page también sigue una arquitectura modular. El archivo `index.js` inicializa funcionalidades específicas:

```javascript
import { initNavbar } from './navbar';
import { initHero } from './hero';
// ... imports
```

| Módulo | Funcionalidad |
|--------|---------------|
| `index.js` | Punto de entrada que inicializa todos los módulos |
| `_utils.js` | Utilidades generales (ej. restauración de scroll) |
| `_navbar.js` | Lógica de la barra de navegación (scroll, active links) |
| `_stats.js` | Animación de contadores numéricos y observer |
| `_cards.js` | Efectos de hover "magic glow" en tarjetas |
| `_features.js` | Generación de gradientes aleatorios para iconos |
| `_back-to-top.js` | Control del botón de volver arriba |

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

#### **Modularidad Completa**
- **Blade Components**: Cada sección de la página es un componente reutilizable
- **CSS Modular**: Estilos organizados en archivos independientes por funcionalidad
- **JavaScript Organizado**: Scripts separados por página y funcionalidad

#### **Mantenibilidad**
- **Fácil localización**: Encuentra código específico rápidamente
- **Edición sin conflictos**: Múltiples desarrolladores pueden trabajar simultáneamente
- **Debugging simplificado**: Errores aislados en módulos específicos

#### **Escalabilidad**
- **Agregar features**: Crea nuevos módulos sin tocar código existente
- **Reutilización**: Importa solo los componentes/estilos que necesites
- **Crecimiento sostenible**: La arquitectura soporta expansión sin refactorización

#### **Performance**
- **Vite optimiza automáticamente**: Minificación y tree-shaking
- **Code splitting**: Carga solo lo necesario
- **Hot Module Replacement**: Desarrollo rápido sin recargas completas

#### **SEO & Accesibilidad**
- **Meta tags completos**: Open Graph, Twitter Cards, Schema.org
- **HTML semántico**: Estructura clara para crawlers
- **Performance optimizado**: Core Web Vitals mejorados


#### **Developer Experience (DX)**
- **Estructura clara**: Convenciones fáciles de seguir
- **Documentación integrada**: Comentarios y organización lógica
- **Desarrollo rápido**: HMR y arquitectura predecible

## Comandos de Desarrollo

### Desarrollo

```bash
# Iniciar servidor de desarrollo con HMR
npm run dev

# Servidor Laravel (si usas Artisan Serve)
php artisan serve
```

### Producción

```bash
# Compilar assets para producción
npm run build

# Limpiar caché de Laravel
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Instalación

```bash
# Instalar dependencias PHP
composer install

# Instalar dependencias Node.js
npm install

# Generar key de aplicación
php artisan key:generate
```

