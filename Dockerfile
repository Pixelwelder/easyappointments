FROM php:7.4-apache

WORKDIR "/var/www/html"

ARG DEBIAN_FRONTEND=noninteractive

# setup PHP environment
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zip \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd gettext mysqli pdo_mysql
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN a2enmod rewrite

# copy composer files and install first -- this means that these layers will not be rerun when changing application code
COPY composer.* ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename composer && composer update

# now copy application code
COPY docker/server/php.ini /usr/local/etc/php/conf.d/99-overrides.ini
COPY . /var/www/html

# finally, these folders neet sticky bits
RUN chmod 1777 storage/backups storage/cache storage/logs storage/sessions storage/uploads