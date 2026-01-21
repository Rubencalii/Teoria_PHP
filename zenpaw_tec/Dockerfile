FROM php:8.4-fpm

# Instala dependencias del sistema y extensiones necesarias
RUN apt-get update \
    && apt-get install -y git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/html
