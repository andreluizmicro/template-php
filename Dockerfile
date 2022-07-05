FROM php:8.1.1-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

WORKDIR /var/www

RUN usermod -u 1000 www-data

COPY --from=composer:latest  /usr/bin/composer /usr/bin/composer

