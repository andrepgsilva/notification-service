FROM php:7.4.14-fpm-buster

ARG user=laravel
ARG uid=1000

RUN docker-php-ext-install bcmath pdo_mysql
RUN useradd -G www-data,root -u $uid -d /home/$user $user

WORKDIR /var/www/html

USER $user