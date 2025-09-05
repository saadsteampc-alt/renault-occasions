# Dockerfile (place in repo root)
FROM php:8.2-cli

# system deps
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip git curl libzip-dev libpng-dev libonig-dev \
  && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd zip \
  && rm -rf /var/lib/apt/lists/*

# bring composer binary
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# copy only composer files first to leverage cache
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader || true

# copy the rest of the app
COPY . .

# ensure storage & cache have correct perms
RUN mkdir -p storage bootstrap/cache \
 && chown -R www-data:www-data storage bootstrap/cache || true

ENV APP_ENV=production
ENV PORT=10000
EXPOSE 10000

# Start: run simple setup and start php built-in server on $PORT
CMD ["sh", "-c", "php artisan config:cache || true; php artisan route:cache || true; php artisan migrate --force || true; php artisan serve --host=0.0.0.0 --port=${PORT}"]
