FROM ubuntu:20.04
ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
    apt-get -y upgrade && \
    apt-get install -y software-properties-common curl && \
    LC_ALL=C.UTF-8 add-apt-repository -y -u ppa:ondrej/php && \
    apt-get install -y \
    php7.4 \
    php7.4-fpm \
    php7.4-pgsql \
    php7.4-xml \
    php7.4-gd \
    php7.4-gmp \
    php7.4-curl \
    php7.4-redis \
    php7.4-mbstring \
    php7.4-xml \
    php7.4-opcache \
    php7.4-bcmath \
    php7.4-common \
    php7.4-dom \
    php7.4-phar \
    php7.4-zip \
    php7.4-simplexml \
    php7.4-tokenizer \
    php7.4-pdo \
    php7.4-fileinfo \
    php7.4-ctype \
    php7.4-exif \
    php7.4-xmlwriter \
    php7.4-xmlreader \
    php7.4-iconv \
    php7.4-sqlite \
    php7.4-mysql \
    curl \
    zip \
    mcrypt \
    openssl \
    nginx \
    vim \
    libargon2-1 \
    libidn2-0 \
    libpcre2-8-0 \
    libpcre3 \
    libxml2 \
    libzstd1 \
    default-mysql-client \
    supervisor && \
    rm -fr /var/lib/apt/lists/*

# Install extensions
#RUN apt-get install -y mysqli pdo pdo_mysql zip exif pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN rm -f /etc/nginx/nginx.conf
RUN rm -f /etc/nginx/sites-enabled/default

WORKDIR /var/www/app

ADD ./docker/nginx /etc/nginx

ADD . .
RUN composer validate
RUN composer install --optimize-autoloader --prefer-dist --no-progress

RUN cp /var/www/app/.env.example /var/www/app/.env

RUN chown -R www-data:www-data /var/www/app

RUN mkdir /run/php

COPY docker/php/laravel.conf /etc/php/7.4/fpm/pool.d/laravel.conf
COPY docker/php/php.ini /etc/php/7.4/fpm/php.ini

RUN rm /etc/php/7.4/fpm/pool.d/www.conf

RUN sed -i -e 's/;daemonize = yes/daemonize = no/g' /etc/php/7.4/fpm/php-fpm.conf

COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chown -R www-data:www-data /var/log/supervisor/ &&\
    chown -R www-data:www-data /etc/nginx/

RUN chmod +x "./docker/entrypoint.sh"

CMD ["/bin/bash", "./docker/entrypoint.sh"]
