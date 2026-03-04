<div align="center">

<!-- Logo / Banner -->
<img src="https://www.vip2cars.com/img/logo/vip2car_logo.svg" alt="VIP2CARS Logo" height="72" />

# VIP2CARS — Portal de Gestión

**Sistema interno para registro de vehículos y encuestas anónimas**  
Desarrollado con Laravel · Blade · MySQL

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)
[![Node](https://img.shields.io/badge/Node.js-18+-339933?style=flat-square&logo=nodedotjs&logoColor=white)](https://nodejs.org)

</div>

---

## Tabla de contenidos

1. [Descripción general](#descripción-general)
2. [Requisitos previos](#requisitos-previos)
3. [Instalación y puesta en marcha](#instalación-y-puesta-en-marcha)
4. [Variables de entorno](#variables-de-entorno)
5. [Comandos útiles](#comandos-útiles)

---

## Descripción general

Portal web interno de **VIP2CARS** — el primer taller automotriz especializado en vehículos de gama alta en Lima Norte — que permite:

- **Registrar y gestionar vehículos** con datos del cliente asociado (CRUD completo).

---

## Requisitos previos

Asegúrate de tener instalado lo siguiente antes de continuar:

| Herramienta | Versión mínima | Verificar |
|-------------|---------------|-----------|
| PHP | 8.2 | `php -v` |
| Composer | 2.x | `composer -V` |
| Node.js | 18.x | `node -v` |
| npm | 9.x | `npm -v` |
| MySQL | 8.0 | `mysql --version` |
| Git | cualquiera | `git --version` |

---

## Instalación y puesta en marcha

Sigue estos pasos **en orden** para levantar el proyecto localmente.

### 1 — Clonar el repositorio

```bash
git clone https://github.com/vip2cars/portal.git
cd portal
```

### 2 — Instalar dependencias PHP

```bash
composer install
```

> Esto descarga todos los paquetes definidos en `composer.json` dentro de la carpeta `vendor/`.

### 3 — Instalar dependencias JavaScript

```bash
npm install
```

> Instala las dependencias de front-end definidas en `package.json`.

### 4 — Configurar variables de entorno

Copia el archivo de ejemplo y edítalo con tus credenciales locales:

```bash
cp .env.example .env
```

Abre `.env` y configura al menos los siguientes valores:

```env
APP_NAME="VIP2CARS Portal"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vip2cars
DB_USERNAME=root
DB_PASSWORD=tu_contraseña
```

Luego genera la clave de aplicación:

```bash
php artisan key:generate
```

### 5 — Ejecutar migraciones

```bash
php artisan migrate
```

> Crea todas las tablas necesarias en la base de datos configurada en `.env`.  
> Para también poblar datos de prueba, añade el flag `--seed`:
> ```bash
> php artisan migrate --seed
> ```

### 6 — Levantar el servidor de desarrollo

```bash
php artisan serve
```

La aplicación estará disponible en:

```
http://127.0.0.1:8000
```

---

## Variables de entorno

Las variables más importantes del archivo `.env`:

| Variable | Descripción | Valor por defecto |
|----------|-------------|-------------------|
| `APP_NAME` | Nombre de la aplicación | `VIP2CARS Portal` |
| `APP_ENV` | Entorno de ejecución | `local` |
| `APP_DEBUG` | Modo debug (desactivar en producción) | `true` |
| `APP_URL` | URL base de la aplicación | `http://localhost` |
| `DB_CONNECTION` | Driver de base de datos | `mysql` |
| `DB_HOST` | Host de la base de datos | `127.0.0.1` |
| `DB_PORT` | Puerto de la base de datos | `3306` |
| `DB_DATABASE` | Nombre de la base de datos | `vip2cars` |
| `DB_USERNAME` | Usuario de la base de datos | `root` |
| `DB_PASSWORD` | Contraseña de la base de datos | _(vacío)_ |

> ⚠️ **Nunca subas el archivo `.env` al repositorio.** Está incluido en `.gitignore` por defecto.

---

## Comandos útiles

```bash
# Limpiar caché de la aplicación
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Rehacer todas las migraciones (⚠️ elimina datos)
php artisan migrate:fresh

# Rehacer migraciones con seeders
php artisan migrate:fresh --seed

# Ver todas las rutas registradas
php artisan route:list

# Compilar assets de front-end
npm run dev        # Modo desarrollo (watch)
npm run build      # Producción
```

---

<div align="center">

**VIP2CARS** · Desarrollado por Eduardo Martínez Sotelo
[trabajoeduardo1924@gmail.com](mailto:trabajoeduardo1924@gmail.com) · [929 642 450](tel:929642450)

© 2025 Eduardo Martínez Sotelo. Todos los derechos reservados.

</div>