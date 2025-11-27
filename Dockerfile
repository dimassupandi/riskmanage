FROM php:8.2-fpm

# Install dependensi
RUN apt-get update && apt-get install -y \
    libpng-dev libonig-dev libxml2-dev zip unzip git curl

# Install ekstensi PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy file project
COPY . .

# Install dependensi Laravel
RUN composer install --optimize-autoloader --no-dev

# Permission folder storage
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# (opsional) generate APP_KEY kalau belum
# RUN php artisan key:generate

# Laravel akan listen di port 8000
EXPOSE 8000

# Jalankan Laravel dev server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
