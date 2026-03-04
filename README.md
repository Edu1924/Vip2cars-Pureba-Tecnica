<div align="center">

<!-- Logo / Banner -->
<img src="https://www.vip2cars.com/img/logo/vip2car_logo.svg" alt="VIP2CARS Logo" height="72" />

# VIP2CARS — Portal de Gestión

**Sistema interno para registro de vehículos y encuestas anónimas**  
Desarrollado con Laravel · Blade · SQLite

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat-square&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![SQLite](https://img.shields.io/badge/SQLite-07405E?style=flat-square&logo=sqlite&logoColor=white)](https://sqlite.org)
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

Portal web interno de **VIP2CARS**

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

Copia el archivo de ejemplo:

```bash
cp .env.example .env
```

Genera la clave de la aplicación:

```bash
php artisan key:generate
```

> **Nota importante:** El proyecto viene preconfigurado para ejecutarse con **SQLite** (`DB_CONNECTION=sqlite`). **No es necesario configurar credenciales ni bases de datos localmente**, el archivo `.env.example` ya contiene la configuración ideal.

### 5 — Ejecutar migraciones

```bash
php artisan migrate --seed
```

> **SQLite:** Laravel te preguntará si deseas crear el nuevo archivo `database.sqlite` de forma automática. Responde escribiendo `yes`. Las migraciones crearán las tablas y los seeders insertarán los datos de inicio.

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
| `DB_CONNECTION` | Driver de base de datos | `sqlite` |

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