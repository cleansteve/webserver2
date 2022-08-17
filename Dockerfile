FROM php:8.0-apache

WORKDIR /var/www/html

COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y \
        git \
        libzip-dev \
        zip \
        procps \
        default-mysql-client \
        npm \
    && docker-php-ext-install \
        zip \
        pdo \
        pdo_mysql \
    && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
