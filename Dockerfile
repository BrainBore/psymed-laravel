# Usa PHP 8.2 CLI como base
FROM php:8.2-cli

# Instala dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    mariadb-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define directorio de trabajo
WORKDIR /app

# Copia todos los archivos al contenedor
COPY . /app

# Da permisos correctos a storage y bootstrap/cache
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage \
    && chmod -R 755 /app/bootstrap/cache

# Expone el puerto que Render asignará
EXPOSE 10000

# Ejecuta Laravel con servidor interno apuntando a cualquier host
CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}

