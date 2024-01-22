FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
 curl \
 libpng-dev \
 libonig-dev \
 libxml2-dev \
 zip \
 unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring

RUN echo `Current working directory: $(pwd)`
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /src
COPY . .

RUN composer install

EXPOSE 8000
CMD php -S 127.0.0.1:8000 -t public