# Sử dụng PHP 8.0
FROM php:8.1-fpm

# Cài đặt các extension PHP cần thiết
RUN docker-php-ext-install pdo pdo_mysql

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cài đặt Node.js và npm
RUN apt-get update && apt-get install -y \
    curl \
    nodejs \
    npm

# Cài đặt Laravel Installer
RUN composer global require laravel/installer

# Add Composer's global vendor bin directory to the PATH
ENV PATH="~/.composer/vendor/bin:$PATH"

# Mở cổng mặc định của Laravel
EXPOSE 8000

# Start Laravel's development server
CMD php artisan serve --host=0.0.0.0 --port=8000
