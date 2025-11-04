# Etapa 1: Builder con Composer y Node
FROM php:8.2-fpm AS builder

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip unzip git curl nodejs npm \
    mariadb-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copia solo composer para cache de dependencias
COPY composer.json composer.lock ./

# Instala dependencias PHP
RUN composer install --no-dev --optimize-autoloader

# Copia todo el proyecto
COPY . .

# Genera assets con Laravel Mix
RUN npm install && npm run prod

# Etapa 2: Imagen final ligera
FROM php:8.2-fpm

WORKDIR /app

# Copiamos todo lo generado en builder
COPY --from=builder /app /app

# Permisos
RUN chown -R www-data:www-data /app \
    && chmod -R 755 /app/storage \
    && chmod -R 755 /app/bootstrap/cache

# Puerto Render
EXPOSE 10000

# Comando final
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]
