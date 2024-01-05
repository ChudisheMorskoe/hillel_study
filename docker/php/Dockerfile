FROM php:8.2-apache

# pdo_mysql
RUN docker-php-ext-install -j$(nproc) pdo_mysql

#update plus .docker
RUN apt-get update && apt-get upgrade -y && apt-get install -y git

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#apache
RUN /usr/sbin/a2enmod rewrite

COPY default.conf /etc/apache2/sites-available/000-default.conf