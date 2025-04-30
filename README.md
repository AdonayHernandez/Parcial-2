#  Sistema de Gestión Hospitalaria – Parcial 2 (Diseño de Bases de Datos)

Este proyecto corresponde al segundo parcial de la asignatura **Diseño de Bases de Datos**
##  Requisitos Previos

Antes de iniciar, asegúrate de tener instalado lo siguiente:

- PHP >= 8.1
- Composer
- Laravel >= 10
- MySQL o MariaDB

---

##  Instalación del Proyecto

1. **Clonar el repositorio (si aplica)**

   ```bash
   git clone https://github.com/AdonayHernandez/Parcial-2.git
   cd parcial-2

# Instalar dependencias de PHP y Node.js
composer install
npm install

# Copiar archivo de entorno y generar la clave de aplicación
cp .env.example .env
php artisan key:generate

# Ejecutar migraciones y seeders
php artisan migrate --seed
