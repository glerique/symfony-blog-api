FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    git \
    unzip \
    postgresql-dev \
    autoconf \
    g++ \
    make \
    linux-headers \
    && docker-php-ext-install pdo pdo_pgsql \
    && pecl install redis \
    && pecl install xdebug \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable xdebug

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader


RUN chown -R www-data:www-data /var/www/html
USER www-data

EXPOSE 9000
CMD ["php-fpm"]
