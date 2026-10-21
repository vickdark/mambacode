# Portal de accesos a productos

El directorio del equipo está en `/accesos` y se abre desde **Acceso Admin** en la navegación de escritorio y móvil. Es un directorio público de enlaces: cada producto mantiene su propia autenticación. No almacena ni comparte credenciales.

El portal envía `noindex, nofollow` en el HTML y en `X-Robots-Tag`. Su ruta `access.index` queda fuera del sitemap público. Esto evita solicitar su indexación; no es un control de acceso.

## Destinos

Los productos y sus accesos se mantienen en `config/products.php`. Las URL se pueden sobrescribir desde el entorno:

| Variable | Destino predeterminado |
| --- | --- |
| `HOSPITALITY_ACCESS_URL` | `https://licorera-pos.mambacode.dev/superadmin` |
| `SALES_ACCESS_URL` | `https://licorera-pos.mambacode.dev/login` |
| `TRANSPORTS_ACCESS_URL` | `https://test-transporteskemuel.mambacode.dev/login/index.php` |
| `ITAM_ACCESS_URL` | Pendiente; el acceso no se muestra hasta configurarlo |
| `ALOJA360_ACCESS_URL` | `https://aloja360.mambacode.dev/login` |
| `MEDICOS_INTEGRADOS_ACCESS_URL` | `https://medicosintegrados.mambacode.dev/` |

Las variables anteriores `HOSPITALITY_ADMIN_URL`, `SALES_LOGIN_URL`, `TRANSPORTS_LOGIN_URL` e `ITAM_LOGIN_URL` siguen aceptándose como compatibilidad; se recomienda migrar a las variables `*_ACCESS_URL`. Solo se muestran enlaces HTTPS válidos y sin credenciales en la URL. Los productos en desarrollo no aparecen en el directorio.

`ADMIN_LOGIN_URL` ya no se usa. La navegación lleva al portal, y la página de ventas usa `SALES_ACCESS_URL` para el botón **Ingresar al sistema**.

Cada tarjeta muestra una portada configurada en `config/products.php`. La portada de Aloja360 corresponde a una captura del panel de reservas; las tarjetas de ventas y cafeterías/bares usan las capturas de sus respectivos sistemas entregadas por el equipo.

## Productos en migración

- El enlace de transporte conserva la URL actual facilitada por el equipo y se muestra como **En migración · acceso actual**. Cuando termine la migración, actualizar `TRANSPORTS_ACCESS_URL` y la descripción/nota en `config/products.php`.
- Aloja360 se muestra como **En migración · acceso actual** y enlaza a `https://aloja360.mambacode.dev/login`. Para conocer el producto, visita `/aloja360`.
- Médicos Integrados se muestra como **En migración · acceso actual** y enlaza a `https://medicosintegrados.mambacode.dev/`. Para conocer el producto, visita `/medicos-integrados`.

Aloja360 está orientado a la gestión integral de alojamientos turísticos, incluyendo disponibilidad, tarifas, huéspedes, cotizaciones, reservas, pagos y operación del alojamiento.
Médicos Integrados presenta acceso a citas y funciones para consultar historial médico, diagnósticos, recetas y pagos.

## Publicación

Desplegar los archivos del proyecto mediante el flujo habitual del servidor. Compilar los estilos con `npm run build` e incluir el resultado de `public/build`. Después de actualizar configuración y vistas en producción:

```sh
php artisan config:cache
php artisan view:cache
```

Si el despliegue utiliza rutas cacheadas, regenerarlas con `php artisan route:cache`.

Comprobar `/accesos`, `/pos-cafeterias-bares`, `/sales`, `/aloja360` y `/medicos-integrados`. Los productos se incorporan automáticamente al sitemap por sus nombres de ruta `products.*`.
