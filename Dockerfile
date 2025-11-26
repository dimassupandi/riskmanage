# 1. Gunakan base image PHP resmi
FROM php:8.2-cli

# 2. Install library sistem yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl

# 3. Install ekstensi PHP untuk database & lainnya
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# 4. Install Composer (Manajer Paket PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Set folder kerja di dalam container
WORKDIR /var/www

# 6. Salin semua file project ke dalam container
COPY . .

# 7. Install dependensi Laravel via Composer
RUN composer install --optimize-autoloader --no-dev

# 8. Set permission (PENTING: agar Laravel bisa tulis log/cache)
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# 9. Expose port 8000
EXPOSE 8000

# 10. Perintah default saat container jalan
CMD php artisan serve --host=0.0.0.0 --port=8000
