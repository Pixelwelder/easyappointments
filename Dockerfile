FROM php:7.4-apache

WORKDIR "/var/www/html"

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd gettext mysqli pdo_mysql

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN a2enmod rewrite

COPY docker/server/php.ini /usr/local/etc/php/conf.d/99-overrides.ini
#COPY . /var/www/html
#RUN chmod 1777 storage/backups storage/cache storage/logs storage/sessions storage/uploads