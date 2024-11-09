FROM mirror.gcr.io/library/php:7.4-fpm

COPY ./conf.d/php.ini /usr/local/etc/php/conf.d/
RUN apt-get update && apt-get install -y \
    curl \
    wget \
    git \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install \
    iconv \
    mbstring \
    mysqli \
    pdo \
    pdo_mysql \
    zip \
    json \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-enable mysqli

WORKDIR /var/www/html

CMD ["php-fpm"]