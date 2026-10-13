# Protección anti-spam del formulario de contacto

Este documento explica el problema de spam en el formulario de `/contact`, su causa y las medidas que se implementaron. También incluye lo que queda pendiente y cómo operarlo en producción.

---

## 1. El problema

Al correo del equipo llegaban mensajes publicitarios a través del formulario de contacto. Por ejemplo:

> **Asunto:** [Contacto MambaCode] Unlimited B2B data — any industry, any town - FREE
> **Nombre:** Quinton Woodd · **Empresa:** Quinton Woodd · **Mensaje:** promoción de "CompanyScout" con 2 enlaces.

Los encabezados del correo muestran que **salió de nuestro propio servidor** (`Received: from mambacode.dev (srv805136.hstgr.cloud)`) y que pasó SPF, DKIM y DMARC. No era un correo falsificado: alguien (un bot) envió el formulario como si fuera un visitante normal.

## 2. La causa

El formulario solo tenía la validación de campos y el token CSRF de Laravel.

**El CSRF no protege contra bots.** Su función es impedir que otro sitio haga envíos a nombre de un usuario que tiene sesión iniciada. Un bot simplemente:

1. Hace `GET /contact`, como cualquier visitante.
2. Lee el `_token` del HTML.
3. Hace `POST /contact` con ese token y sus datos.

Para el servidor, ese envío es válido. Además, el `sitemap.xml` y el `robots.txt` le muestran a los rastreadores dónde está `/contact`, así que el formulario es fácil de encontrar.

### Riesgos que no se habían considerado

| Riesgo | Consecuencia |
|---|---|
| No había nada que distinguiera a un humano de un bot | Cualquier script podía enviar el formulario |
| No había límite de envíos por IP | Una sola IP podía mandar cientos de mensajes por minuto |
| El correo se envía por Gmail SMTP, que tiene un límite diario de envío (alrededor de 500 destinatarios en una cuenta normal) | Un ataque podía agotar ese límite: **los mensajes de clientes reales fallarían** y la cuenta podría quedar bloqueada |
| El `catch` del controlador muestra "Hemos recibido tu mensaje" aunque el correo falle | Si se agota el límite de Gmail, nadie se entera |
| El consentimiento de datos solo se validaba en el navegador (`required` en el HTML) | Un POST directo se lo saltaba. La Ley 1581 exige poder demostrar la autorización |
| No había revisión del contenido (enlaces, longitud) | Se aceptaba cualquier cosa |
| No se registraba nada | No había forma de medir el spam |
| El HTML de `/contact` se guardaba en caché como `public, max-age=3600` | Un CDN o proxy podía entregarle a un visitante el token CSRF de otro, lo que causa errores 419 al enviar |
| Los destinatarios estaban escritos en el código | Cambiarlos exigía modificar código y desplegar |

---

## 3. La solución: varias capas de protección

Ninguna capa necesita servicios externos. Cuando una de ellas detecta spam, **el bot recibe la misma respuesta de éxito que un usuario real** (incluso con un número de referencia falso), pero el correo no se envía. Así el bot no aprende qué lo delató. Cada bloqueo se registra en el log.

### Capa 1: Campo trampa (honeypot)

- **Archivos:** `resources/views/components/landing/contact-form.blade.php` y `resources/css/pages/landing/_contact-form.css`
- El formulario tiene un campo `website` que se oculta fuera de la pantalla con CSS (`.contact-form-hp`). Lleva `tabindex="-1"`, `autocomplete="off"` y `aria-hidden="true"`, para que ni los lectores de pantalla ni el autocompletado del navegador lo llenen.
- Una persona nunca lo ve. Los bots suelen llenar todos los campos que encuentran. **Si el campo llega con algo escrito, es spam.**

### Capa 2: Trampa de tiempo

- **Campo:** `form_started_at` (oculto), que guarda `encrypt(now()->timestamp)` al cargar la página.
- El servidor lo descifra. Marca el envío como spam si:
  - falta o fue alterado (no se puede descifrar), o
  - se envió **menos de 4 segundos** después de cargar la página. Una persona no alcanza a llenar el formulario tan rápido.
- Como el valor está cifrado con `APP_KEY`, el bot no puede inventar un valor válido.

### Capa 3: Límite de envíos por IP

- **Archivos:** `app/Providers/AppServiceProvider.php` (define el limitador `contact`) y `routes/web.php` (`->middleware('throttle:contact')`)
- Permite como máximo **3 envíos cada 10 minutos** y **10 al día** por IP.
- Quien pase el límite vuelve al formulario con el mensaje: *"Has enviado demasiados mensajes. Intenta de nuevo más tarde."* No ve una página de error 429.
- Esta capa protege la cuota de Gmail aunque un bot logre pasar las demás.

### Capa 4: Filtro de contenido

- **Archivo:** `app/Http/Controllers/ContactController.php`, método `spamReason()`
- Bloquea:
  - enlaces (`http://`, `https://`, `www.`) en nombre, empresa, cargo o asunto;
  - **más de 1 enlace** en el mensaje;
  - frases típicas de spam comercial, definidas en la lista `$phrases`: `b2b data`, `backlink`, `seo services`, `guest post`, `crypto`, `download it free`, etc.
- El correo de ejemplo de la sección 1 habría sido bloqueado por dos razones: la frase "b2b data" y los 2 enlaces del mensaje.

### Validaciones del servidor reforzadas

- `data_consent => 'accepted'`: ahora el servidor exige el consentimiento. Este campo no se incluye en el correo.
- `message => 'min:10|max:5000'`.

### Caché del HTML corregida

- **Archivo:** `app/Http/Middleware/SetCacheHeaders.php`
- Las respuestas personalizadas ahora se envían con `Cache-Control: no-store, private`. Son personalizadas cuando:
  - la petición no es GET/HEAD (por ejemplo, el POST del formulario);
  - la respuesta no es 200 (redirecciones, errores);
  - la ruta está en `PERSONALIZED_ROUTES` (por ahora solo `contact`).
- El resto de páginas mantiene `public, max-age=3600`, así que el rendimiento no cambia. Si en el futuro otra página incluye un formulario con `@csrf`, hay que agregar su ruta a `PERSONALIZED_ROUTES`.

### Destinatarios configurables y un solo envío

- **Archivos:** `config/mail.php` (`contact_recipients`) y `.env.example`
- Los destinatarios se leen de la variable `CONTACT_RECIPIENTS`, separados por comas. Si no está definida, se usan los dos correos actuales del equipo.
- Antes se enviaba un correo por destinatario, lo que significaba dos conexiones SMTP. Ahora se envía **un solo correo dirigido a todos**. La respuesta al usuario es más rápida.
  - Ojo: Gmail cuenta la cuota por destinatario, así que el consumo de la cuota es el mismo. Lo que protege la cuota es el límite de envíos de la capa 3.

---

## 4. Archivos modificados

| Archivo | Cambio |
|---|---|
| `resources/views/components/landing/contact-form.blade.php` | Campo trampa `website` y campo oculto `form_started_at` |
| `resources/css/pages/landing/_contact-form.css` | Clase `.contact-form-hp` que oculta el campo trampa |
| `app/Http/Controllers/ContactController.php` | Validaciones, método `spamReason()`, destinatarios desde config, un solo envío |
| `app/Providers/AppServiceProvider.php` | Limitador `contact` |
| `routes/web.php` | `throttle:contact` en `POST /contact` |
| `app/Http/Middleware/SetCacheHeaders.php` | `no-store, private` para respuestas personalizadas |
| `config/mail.php` | Opción `contact_recipients` |
| `.env.example` | Variable `CONTACT_RECIPIENTS` |
| `tests/Feature/ContactFormSpamTest.php` | Pruebas de todo lo anterior |

---

## 5. Despliegue

1. Subir el código y compilar los assets (`npm run build`), porque cambió el CSS.
2. Opcional: definir `CONTACT_RECIPIENTS` en el `.env` de producción si los destinatarios deben ser otros.
3. Si producción usa caché de configuración, regenerarla:
   ```bash
   php artisan config:cache
   ```
4. El limitador guarda sus contadores en el `CACHE_STORE` configurado. Si es `database`, la tabla `cache` ya existe por la migración `0001_01_01_000001_create_cache_table.php`.

> **Nota para desarrollo local:** si al correr `php artisan test` aparecen errores **419**, hay una configuración cacheada en `bootstrap/cache/config.php` que ignora `APP_ENV=testing`. Se arregla con `php artisan config:clear`.

---

## 6. Operación

### Revisar el spam bloqueado

Cada bloqueo deja una línea de nivel `warning` en `storage/logs/laravel.log`:

```
Contact form spam blocked: spam phrase: b2b data {"ip":"…","email":"…","subject":"…"}
```

Para revisarlos:

```bash
grep "spam blocked" storage/logs/laravel.log
```

Las razones posibles son: `honeypot`, `missing or tampered timestamp`, `submitted too fast`, `link in <campo>`, `too many links` y `spam phrase: <frase>`.

### Ajustar el filtro

- **Si un cliente real queda bloqueado** (aparece en el log con datos legítimos): quitar o afinar la frase en `$phrases`, o subir el límite de enlaces en `spamReason()`.
- **Si llega spam nuevo con un patrón repetido:** agregar la frase a `$phrases`, en minúsculas.
- **Si el límite de envíos molesta a usuarios reales** (por ejemplo, varias personas de una oficina detrás de la misma IP): ajustar los valores de `Limit::perMinutes(10, 3)` y `Limit::perDay(10)`.

### Pruebas

```bash
php artisan test --filter=ContactFormSpamTest
```

Cubren estos casos:

- un mensaje legítimo se envía una sola vez a ambos destinatarios;
- cada tipo de spam se descarta sin enviar correo y responde con éxito;
- el cuarto envío seguido desde una misma IP se bloquea;
- `/contact` no se guarda en caché pública, y las demás páginas sí.

---

## 7. Pendiente

### 7.1 Enviar los correos en cola (requiere configurar el servidor)

**Situación actual:** el correo se envía durante la petición, así que el usuario espera la conexión SMTP con Gmail (1 a 3 segundos). Si Gmail falla, el error se registra en el log, pero el mensaje se pierde.

**Por qué no se activó todavía:** el VPS de Hostinger **no tiene un *worker* de colas**. Si se encola el correo sin un worker corriendo, **los correos nunca se envían**. Por eso el envío sigue siendo directo (`send`). No hay que cambiarlo a `queue` hasta completar el paso 3.

**Pasos para activarla:**

1. En el `.env` de producción:
   ```env
   QUEUE_CONNECTION=database
   ```
   Las tablas `jobs` y `failed_jobs` ya existen por la migración `0001_01_01_000002_create_jobs_table.php`. Basta con correr `php artisan migrate`.

2. En `ContactController::store()`, cambiar `send` por `queue`:
   ```php
   Mail::to($recipients)->queue(new ContactFormMail($data));
   ```

3. Mantener el *worker* corriendo con Supervisor. Crear el archivo `/etc/supervisor/conf.d/mambacode-worker.conf`:
   ```ini
   [program:mambacode-worker]
   command=php /ruta/al/proyecto/artisan queue:work --sleep=3 --tries=3 --max-time=3600
   autostart=true
   autorestart=true
   user=www-data
   numprocs=1
   redirect_stderr=true
   stdout_logfile=/ruta/al/proyecto/storage/logs/worker.log
   stopwaitsecs=3600
   ```
   Luego aplicar la configuración:
   ```bash
   sudo supervisorctl reread && sudo supervisorctl update && sudo supervisorctl start mambacode-worker
   ```
   En cada despliegue, reiniciar el worker para que cargue el código nuevo:
   ```bash
   php artisan queue:restart
   ```

   *Alternativa sin Supervisor:* agregar el planificador de Laravel al cron (`* * * * * php /ruta/artisan schedule:run`) y programar `queue:work --stop-when-empty` en `routes/console.php`.

4. Con la cola activa, los fallos de Gmail ya no los captura el `try/catch`. Quedan en la tabla `failed_jobs`. Para revisarlos y reintentarlos:
   ```bash
   php artisan queue:failed
   php artisan queue:retry all
   ```

### 7.2 Si el spam continúa: Cloudflare Turnstile

Las 4 capas detienen a los bots automáticos, que son la gran mayoría. Algunas herramientas de "outreach" comercial usan navegadores reales o personas, y pueden pasar el honeypot y la trampa de tiempo. Si eso pasa, el siguiente paso es **Cloudflare Turnstile**, un captcha gratuito que normalmente no le pide nada al usuario:

1. Crear un sitio en el panel de Cloudflare → Turnstile y obtener el *site key* y el *secret key*.
2. Agregar el widget al formulario y verificar el token en el servidor con `https://challenges.cloudflare.com/turnstile/v0/siteverify` antes de enviar el correo.

### 7.3 Mejoras menores sugeridas

- Agregar `replyTo($data['email'])` en `ContactFormMail`, para que al responder el correo se le escriba directamente al cliente y no a la cuenta de notificaciones.
- Revisar el mensaje que se muestra cuando el envío falla. Hoy dice "Hemos recibido tu mensaje", aunque el equipo no lo recibió.
